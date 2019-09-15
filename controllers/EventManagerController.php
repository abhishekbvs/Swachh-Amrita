<?php

namespace app\controllers;

use Yii;
use app\models\Event;
use app\models\Team;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Model;

/**
 * EventManagerController implements the CRUD actions for Event model.
 */
class EventManagerController extends Controller
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

        if ($model->load(Yii::$app->request->post())) {

             $modelsTeam = Model::createMultiple(Team::classname());
             Model::loadMultiple($modelsTeam, Yii::$app->request->post());

             // validate all models
             $valid = $model->validate();
             $valid = Model::validateMultiple($modelsTeam) && $valid;

             if ($valid) {
                 $transaction = \Yii::$app->db->beginTransaction();
                 try {
                     if ($flag = $model->save(false)) {
                         foreach ($modelsTeam as $modelTeam) {
                             $modelTeam->event_id   = $model->id;
                             if (! ($flag = $modelTeam->save(false))) {
                                $transaction->rollBack();
                                 break;
                             }
                         }
                     }
                     if ($flag) {
                        return $this->redirect(['view', 'id' => $model->id,]);
                     }
                 }catch (Exception $e) {
                     $transaction->rollBack();
                 }
             }
        }

        return $this->render('create', [
            'model' => $model,
            'modelsTeam' => (empty($modelsTeam)) ? [new Team] : $modelsTeam,
        ]);
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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