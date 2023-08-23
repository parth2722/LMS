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
class CourseController extends Controller
{
    public function actionCourse($id)
    {
        $course = Course::findOne(['id' =>$id]);
        return $this->render('course',['course'=>$course]);
    }
}
