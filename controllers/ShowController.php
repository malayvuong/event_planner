<?php

namespace app\controllers;

use Yii;
use yii\helpers\Url;
use yii\filters\AccessControl;
use yii\web\Response;
use app\models\Linked;
use app\models\Sukien;
use app\models\SukienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ShowController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex()
    {
        $model = new Sukien();
        $sukiens = $model::find()->orderBy(['sk_id'=>SORT_DESC])->asArray()->all();

        return $this->render('index', [
            'sukiens'   =>  $sukiens
        ]);
    }


    public function actionSukien()
    {
        if(isset($_GET['id']) && $_GET['id'] > 0)
        {
            if(Yii::$app->user->isGuest) {
                $this->redirect(Url::base(true).'/site/login');
            }else
            {
                $model = new Sukien();
                $sukien = $model::find()->where(['sk_id' => $_GET['id']])->asArray()->one();
                if(isset($sukien['sk_id']) && $sukien['sk_id'] > 0)
                {
                    //  Get list of congviec
                    $linked = Linked::find()->where(['sk_id'=>$sukien['sk_id']])->asArray()->all();

                }
                return $this->render('chitietsukien', [
                    'sukien'   =>  $sukien,
                    'linked'    =>  $linked,
                ]);
            }
        }else{
            $this->redirect(Url::base(true).'/show');
        }
    }

    public function actionIncoming()
    {
        $model = new Sukien();
        $sukiens = $model::find()->where(['sk_status' => 0])->orderBy(['sk_id'=>SORT_DESC])->asArray()->all();

        return $this->render('index', [
            'sukiens'   =>  $sukiens
        ]);
    }

    public function actionComplete()
    {
        if(Yii::$app->user->isGuest) {
            $this->redirect(Url::base(true).'/site/login');
        }else{
            if(Yii::$app->user->id == 100)
            {
                $model = new Sukien();
                $sukiens = $model::find()->where(['sk_status' => 2])->orderBy(['sk_id'=>SORT_DESC])->asArray()->all();

                return $this->render('index', [
                    'sukiens'   =>  $sukiens
                ]);
            }else{
                $this->redirect(Url::base(true).'/site/login');
            }
        }
    }
}
