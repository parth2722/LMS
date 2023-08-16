<?php

namespace frontend\controllers;

use frontend\models\Learner;
use Yii;
use yii\base\InvalidArgumentException;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * Pite controller
 */
class LearnerController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [

                'class' => AccessControl::className(),
                'only' => ['shop'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ],
            ],
        ];
    }


    public function actionIndex()
    {

        return $this->render('index');
    }
    // public function actionShop()
    // {
    //     $query = Learner::find(); // Replace with your product query
    //     $pagination = new Pagination([
    //         'totalCount' => $query->count(),
    //         'pageSize' => 10, // Adjust the page size as needed
    //     ]);
    
    //     $model = $query->offset($pagination->offset)
    //                    ->limit($pagination->limit)
    //                    ->all();
    
    //     return $this->render('shop', [
    //         'model' => $model,
    //         'pagination' => $pagination,
    //     ]);
    // }
    

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    // public function actionCreate()
    // {

    //     $model = new Learner();

    //     // new record   
    //     if ($model->load(Yii::$app->request->post()) && $model->save()) {
    //         return $this->redirect(['shop']);
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
    //         return $this->redirect(['shop']);
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

    //     return $this->redirect(['shop']);
    // }

}
