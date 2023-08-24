<?php

namespace backend\controllers;


use yii\helpers\Json;
use frontend\models\Classs;
use frontend\models\ClassSearch;
use frontend\models\Course;
// use GuzzleHttp\Psr7\UploadedFile;
use frontend\models\Module;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;


class ClasssController extends \yii\web\Controller
{



    public function behaviors()
    {
        return [
            'access' => [


                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['product'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                    [
                        'actions' => ['product', 'update', 'delete', 'create', 'restore', 'view',],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['get-modules'],
                        'allow' => true,
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $searchModel = new ClassSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Classs();
        $courseList = Course::find()->select(['course_name', 'id'])->indexBy('id')->column();
        $moduleList = []; // You might need to fetch the module list here

        if ($model->load(Yii::$app->request->post())) {
            $imageName = $model->class_name;
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->validate()) {
                if ($model->file) {
                    $model->file->saveAs('@frontend/web/uploads/' . $imageName . '.' . $model->file->extension);
                    $model->file_path = '' . $imageName . '.' . $model->file->extension;
                }

                $model->created_at = date('Y-m-d H:i:s');
            

                if ($model->save()) {
                    return $this->redirect(['index', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'courseList' => $courseList,
            'moduleList' => $moduleList,
        ]);
    }


    public function actionGetModules($courseId)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $moduleList = Module::find()
            ->where(['course_id' => $courseId])
            ->select(['module_name', 'id'])
            ->asArray()
            ->all();

        $moduleOptions = ['' => 'Select a module'];
        foreach ($moduleList as $module) {
            $moduleOptions[$module['id']] = $module['module_name'];
        }

        return ['options' => Html::renderSelectOptions('', $moduleOptions)];
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Classs::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
