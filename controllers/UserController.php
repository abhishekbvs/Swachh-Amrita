<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\UserForm;
use app\models\Event;
use app\models\Registration;
use app\models\Contact;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserForm();
        if ($model->load(Yii::$app->request->post())) {
           if($user = $model->createUser()){
              return $this->redirect(['/site/login']);
           }
        }
        return $this->render('create', [ 'model' => $model ]);
    }


    public function actionDashAdmin()
    {
        $dataContacts = Contact::find()->where(['resolved'=>False])->all();
        $dataUsers = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        return $this->render('admin_dash',['dataContacts'=>$dataContacts,'dataUsers'=>$dataUsers]);
    }


    public function actionDashEventManager()
    {
        $eventsModel = new ActiveDataProvider([
            'query' => Event::find()->where(['user_id'=>Yii::$app->user->getId()]),
        ]);
        return $this->render('event_manager_dash',['dataEvents'=>$eventsModel]);
    }

    public function actionDashVolunteer(){
        
    }

    public function actionDashParticipant()
    {
        $dataRegs  = Registration::find()->where(['user_id'=>Yii::$app->user->getId()])->all();
        return $this->render('participant_dash',['dataRegs'=>$dataRegs]);

    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $user = $this->findModel($id);
        $model = new Userform();
        $model->updateUser($user);
        if ($model->load(Yii::$app->request->post()) && $model->updateChange($user)) {
                return $this->redirect(['view', 'id' => $user->id]);
            }
        return $this->render('update', ['model' => $model]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
