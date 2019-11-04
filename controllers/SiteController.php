<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Stores;
use app\models\Posts;
use app\models\Createuser;
use app\models\Listusers;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
/*    public function actionStore()
    {
        return $this->render('store');
    }
 */
    /**
     * Displays mpe page.
     *
     * @return string
     */
    public function actionMpe()
    {	  $posts = Posts::find()->all();
	   return $this->render('mpe',['posts' => $posts]);
    }
    /**
     * Displays artist page.
     *
     * @return string
     */
    public function actionArtist()
    {
	    return $this->render('artist');
    }

    public function actionStores()
   {
       $model = new Stores();
       if ($model->load(Yii::$app->request->post()) && $model->save()) {
           Yii::$app->session->setFlash('contactFormSubmitted');
           return $this->render('stores', [
               'model' => $model,
           ]);
       } else {
           return $this->render('stores', [
               'model' => $model,
           ]);
       }
    }

    public function actionCreateuser()
   {
       $model = new Createuser();
       if ($model->load(Yii::$app->request->post()) && $model->save()) {
           Yii::$app->session->setFlash('contactFormSubmitted');
           return $this->render('createuser', [
               'model' => $model,
           ]);
       } else {
           return $this->render('createuser', [
               'model' => $model,
           ]);
       }


    }

	public function actionListusers()
	{
		 $users = Listusers::find()->all();
         return $this->render('createuser',['users' => $users]);

	}

}
