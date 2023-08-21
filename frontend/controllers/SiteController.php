<?php

namespace frontend\controllers;

use common\models\LoginForm;
use common\models\User;
use frontend\models\Classs;
use frontend\models\ContactForm;
use frontend\models\Course;
use frontend\models\Module;
use frontend\models\PasswordResetRequestForm;
use frontend\models\Learner;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
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
                'only' => ['course', 'module', 'class'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
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
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAbout()
    {
        return $this->render('about');
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


    public function actionCourse()
    {
        $query = Course::find(); // Replace with your product query
        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 10, // Adjust the page size as needed
        ]);

        $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('course', [
            'model' => $model,
            'pagination' => $pagination,
        ]);
    }

    public function actionModule($id)
    {
        $query = Module::find()
            ->select(['id', 'module_name', 'course_id'])
            ->where(['course_id' => $id]);

        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 10,
        ]);

        $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('module', [
            'model' => $model,
            'pagination' => $pagination,
        ]);
    }


    public function actionClass($id)
    {
        $query = Classs::find()
        ->select(['id', 'file_path','class_name', 'module_id'])
        ->where(['module_id' => $id]);
        $pagination = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 10,
        ]);

        $model = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();


        foreach ($model as $class) {

            $class->file_path = 'uploads/' . $class->file_path;
        }

        return $this->render('class', [
            'model' => $model,
            'pagination' => $pagination,
        ]);
    }

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
    public function actionPjax()
    {
        $message = Yii::$app->request->post('message');
        $response = null;
        if (!is_null($message)) {
            $response = 'Your message is: ' . $message;
        }
        return $this->render('pjax', ['response' => $response]);
    }
}
