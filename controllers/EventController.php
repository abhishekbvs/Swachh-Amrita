<?php

namespace app\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\Event;
use app\models\Team;
use app\models\Volunteer;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;
use app\models\Registration;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Event::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Event model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Event();
        $modelsTeam = [new Team];
        $modelsVolunteer = [[new Volunteer]];
        $model->user_id = Yii::$app->user->getId();

        if ($model->load(Yii::$app->request->post())) {

             $modelsTeam = Model::createMultiple(Team::classname());
             Model::loadMultiple($modelsTeam, Yii::$app->request->post());

             // validate all models
             $valid = $model->validate();
             $valid = Model::validateMultiple($modelsTeam) && $valid;

             if (isset($_POST['Volunteer'][0][0])) {
                foreach ($_POST['Volunteer'] as $indexTeam => $volunteers) {
                    foreach ($volunteers as $indexVolunteer => $volunteer) {
                        $data['Volunteer'] = $volunteer;
                        $modelVolunteer = new Volunteer;
                        $modelVolunteer->load($data);
                        $modelsVolunteer[$indexTeam][$indexVolunteer] = $modelVolunteer;
                        $valid = $modelVolunteer->validate();
                    }
                }
            }
   
             if ($valid) {
                 $transaction = \Yii::$app->db->beginTransaction();
                 try {
                     if ($flag = $model->save(false)) {
                         foreach ($modelsTeam as $indexTeam => $modelTeam) {

                            if($flag == false){
                                break;
                            }

                            $modelTeam->event_id = $model->id;

                            if (! ($flag = $modelTeam->save(false))) {
                                $transaction->rollBack();
                                 break;
                             }

                             if (isset($modelsVolunteer[$indexTeam]) && is_array($modelsVolunteer[$indexTeam])) {
                                foreach ($modelsVolunteer[$indexTeam] as $indexVolunteer => $modelVolunteer) {
                                    $modelVolunteer->team_id = $modelTeam->id;
                                    if (!($flag = $modelVolunteer->save(false))) {
                                        break;
                                    }
                                }
                            }



                         }
                     }
                     if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                     }
                    else{
                        $transaction->rollBack();
                    }
                 }catch (Exception $e) {
                     $transaction->rollBack();
                 }
             }
        }

        return $this->render('create', [
            'model' => $model,
            'modelsTeam' => (empty($modelsTeam)) ? [new Team] : $modelsTeam,
            'modelsVolunteer' => (empty($modelsVolunteer)) ? [new Volunteer] : $modelsVolunteer,
        ]);
    }

    public function actionTeam($id)
    {
        $query = Team::find()->where(['id' => $id])->all();
        $modelTeam = $query[0]; 
        $modelVolunteers =  new ActiveDataProvider([
            'query' =>Volunteer::find()  
            // ->select('user.*')           
            // ->leftJoin('user','user.id = volunteer.user_id')
            ->where(['volunteer.team_id'=> $modelTeam->id]),
        ]);
                        
        return $this->render('team',['dataTeam' => $modelTeam,'dataVolunteers'=>$modelVolunteers]);
    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelsTeam = $model->getTeams($id);
        $modelsVolunteer = [];
        $oldVolunteers = [];

        if (!empty($modelsTeam)) {
            foreach ($modelsTeam as $indexTeam => $modelTeam) {
                $volunteers = $modelTeam->getVolunteers($modelTeam->id);;
                $modelsVolunteer[$indexTeam] = $volunteers;
                $oldVolunteers = ArrayHelper::merge(ArrayHelper::index($volunteers, 'id'), $oldVolunteers);
            }
        }

        if ($model->load(Yii::$app->request->post())) {

            // reset
            $modelsVolunteer = [];

            $oldTeamIDs = ArrayHelper::map($modelsTeam, 'id', 'id');
            $modelsTeam = Model::createMultiple(Team::classname(), $modelsTeam);
            Model::loadMultiple($modelsTeam, Yii::$app->request->post());
            $deletedTeamIDs = array_diff($oldTeamIDs, array_filter(ArrayHelper::map($modelsTeam, 'id', 'id')));

            // validate event and Teams models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsTeam) && $valid;

            $VolunteersIDs = [];
            if (isset($_POST['Volunteer'][0][0])) {
                foreach ($_POST['Volunteer'] as $indexTeam => $Volunteers) {
                    $VolunteersIDs = ArrayHelper::merge($VolunteersIDs, array_filter(ArrayHelper::getColumn($Volunteers, 'id')));
                    foreach ($Volunteers as $indexVolunteer => $Volunteer) {
                        $data['Volunteer'] = $Volunteer;
                        $modelVolunteer = (isset($Volunteer['id']) && isset($oldVolunteers[$Volunteer['id']])) ? $oldVolunteers[$Volunteer['id']] : new Volunteer;
                        $modelVolunteer->load($data);
                        $modelsVolunteer[$indexTeam][$indexVolunteer] = $modelVolunteer;
                        $valid = $modelVolunteer->validate();
                    }
                }
            }

            $oldVolunteersIDs = ArrayHelper::getColumn($oldVolunteers, 'id');
            $deletedVolunteersIDs = array_diff($oldVolunteersIDs, $VolunteersIDs);

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {

                        if (! empty($deletedVolunteersIDs)) {
                            Volunteer::deleteAll(['id' => $deletedVolunteersIDs]);
                        }

                        if (! empty($deletedTeamIDs)) {
                            Team::deleteAll(['id' => $deletedTeamIDs]);
                        }

                        foreach ($modelsTeam as $indexTeam => $modelTeam) {

                            if ($flag === false) {
                                break;
                            }

                            $modelTeam->event_id = $model->id;

                            if (!($flag = $modelTeam->save(false))) {
                                break;
                            }

                            if (isset($modelsVolunteer[$indexTeam]) && is_array($modelsVolunteer[$indexTeam])) {
                                foreach ($modelsVolunteer[$indexTeam] as $indexVolunteer => $modelVolunteer) {
                                    $modelVolunteer->Team_id = $modelTeam->id;
                                    if (!($flag = $modelVolunteer->save(false))) {
                                        break;
                                    }
                                }
                            }
                        }
                    }

                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        $transaction->rollBack();
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'modelsTeam' => (empty($modelsTeam)) ? [new Team] : $modelsTeam,
            'modelsVolunteer' => (empty($modelsVolunteer)) ? [[new Volunteer]] : $modelsVolunteer
        ]);
    }

    public function actionRegister($id)
    {
        $model = new Registration();
        $model->user_id = Yii::$app->user->getId();
    }
    /**
     * Deletes an existing Event model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');

    }
}