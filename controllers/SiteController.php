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
use app\models\Addstock;
use app\models\Additem;

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
	    $posts = Posts::find()->all();
            return $this->render('artist', ['posts' => $posts]);
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
              return $this->render('listusers',['users' => $users]);

	}


    	public function actionRemove($id) {
             $post = Posts::findOne($id)->delete();
          if ($post) {
                  Yii::$app->getSession()->setFlash('message', 'Music deleted');
                  return $this->redirect(['mpe']);
          }

        }


	public function actionDelete($id)
	{ $user = Listusers::findOne($id)->delete();
	  if ($user) {
		  Yii::$app->getSession()->setFlash('message', 'User deleted');
		  return $this->redirect(['createuser']);
	  }
	}

	public function actionView($id)
	{
		$post = Posts::findOne($id);
            	return $this->render('view', ['post' => $post]);
	}
	 public function actionEmplist()
	 {
		 $users = Listusers::find()->all();
              return $this->render('emplist',['users' => $users]);
	    }

	 public function actionInventory()
	 { 
		  $posts = Addstock::find()->all();
              return $this->render('inventory',['posts' => $posts]);
            }


	public function actionAddstock()
	{ $model = new Additem();
       if ($model->load(Yii::$app->request->post()) && $model->save()) {
           Yii::$app->session->setFlash('contactFormSubmitted');
           return $this->render('addstock', [
               'model' => $model,
           ]);
       } else {
           return $this->render('addstock', [
               'model' => $model,
           ]);
       }
	}	


	public function actionDelete_item($id)
        { $posts = Addstock::findOne($id)->delete();
          if ($posts) {
                  Yii::$app->getSession()->setFlash('message', 'Item deleted');
                  return $this->redirect(['inventory']);
          }
        }

	
	public function actionEdit($id)
        {
		$model = Additem::findOne($id);
		if($model->load(yii::$app->request->post()) && $model->save() ){
			Yii::$app->getSession()->setFlash('message','Record Updated');
			return $this->redirect(['inventory', 'id' => $model->id ]);
		}
		else{	
			return $this->render('editpost',['model' => $model ]);
		}
	}


	public function actionAddemployee()
	{ 
		$model = new Createuser();
      		 if ($model->load(Yii::$app->request->post()) && $model->save()) {
          		 Yii::$app->session->setFlash('message');
           			return $this->render('addemployee', [
               			'model' => $model,
           ]);
       } else {
           return $this->render('addemployee', [
               'model' => $model,
           ]);
       }
	}

	public function actionDelete_emp($id)
        { $posts = Listusers::findOne($id)->delete();
          if ($posts) {
                  Yii::$app->getSession()->setFlash('message', 'Item deleted');
                  return $this->redirect(['emplist']);
          }
        }
	
	public function actionDashboard()
	{ return $this->render('dashboard');
	}

}
