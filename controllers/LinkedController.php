<?php

namespace app\controllers;

use Yii;
use app\models\Linked;
use app\models\Users;
use app\models\Congviec;
use app\models\Sukien;
use app\models\LinkedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LinkedController implements the CRUD actions for Linked model.
 */
class LinkedController extends Controller
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
     * Lists all Linked models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest) {
            $this->redirect(Url::base(true).'/site/login');
        }else{
            $searchModel = new LinkedSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Linked model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->isGuest) {
            $this->redirect(Url::base(true).'/site/login');
        }else{
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }
    }

    /**
     * Creates a new Linked model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest) {
            $this->redirect(Url::base(true).'/site/login');
        }else{
            $model = new Linked();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->lid]);
            }
            //  Get List user=
            $users = Users::find()->asArray()->all();
            $congviec = Congviec::find()->asArray()->all();
            $sukien = Sukien::find()->asArray()->all();

            return $this->render('create', [
                'model' => $model,
                'users' =>  $users,
                'congviec' =>  $congviec,
                'sukien' =>  $sukien,
            ]);
        }
    }

    /**
     * Updates an existing Linked model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->isGuest) {
            $this->redirect(Url::base(true).'/site/login');
        }else{
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->lid]);
            }
            //  Get List user=
            $users = Users::find()->asArray()->all();
            $congviec = Congviec::find()->asArray()->all();
            $sukien = Sukien::find()->asArray()->all();

            return $this->render('update', [
                'model' => $model,
                'users' =>  $users,
                'congviec' =>  $congviec,
                'sukien' =>  $sukien,
            ]);
        }
    }

    /**
     * Deletes an existing Linked model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->isGuest) {
            $this->redirect(Url::base(true).'/site/login');
        }else{
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Linked model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Linked the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Linked::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDone()
    {
        $linked = Linked::find()->where(['lid' => Yii::$app->request->get('id')])->one();
        $linked->status = 1;
        $linked->save();
        return $this->redirect(['/show/sukien', 'id' => Yii::$app->request->get('return')]);
    }
}
