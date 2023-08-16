<?php

namespace frontend\controllers;

use common\models\LoginForm;
use common\models\User;
use frontend\models\ContactForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\Learner;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\behaviors\TimestampBehavior;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\Shop;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup', 'about'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['about'],
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
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

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
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
        
    }
    public function actionShop()
    {
        return $this->render('shop');
    }
    public function actionWhy()
    {
        return $this->render('why');
    }
    // public function actionTestimonial()
    // {
    //     $model = Learner::find()->all();
    //     return $this->render('testimonial', ['model' => $model]);
    // }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    // public function actionCreate()
    // {

    //     $model = new Learner();

    //     // new record   
    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['testimonial']);
    //     }

    //     return $this->render('create', ['model' => $model]);
    // }
    // public function actionUpdate($id)
    // {
    //     $model = Learner::find()->where(['id' => $id])->one();

    //     // $id not found in database   
    //     if ($model === null)
    //         throw new NotFoundHttpException('The requested page does not exist.');

    //     // update record   
    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['testimonial']);
    //     }

    //     return $this->render('update', ['model' => $model]);
    // }

    // public function actionDelete($id)
    // {
    //     $model = Learner::findOne($id);

    //     // $id not found in database   
    //     if ($model === null)
    //         throw new NotFoundHttpException('The requested page does not exist.');

    //     // delete record   
    //     $model->delete();

    //     return $this->redirect(['testimonial']);
    // }

    public function actionPjax()
    {
        $message = Yii::$app->request->post('message');
        $response = null;
        if(!is_null($message)){
            $response = 'Your message is: '.$message;
        }
        return $this->render('pjax',['response'=>$response]);
    }

}
