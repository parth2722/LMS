<?php

namespace backend\controllers;

use frontend\models\Course;
use frontend\models\Module;
use frontend\models\ModuleSearch;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\web\NotFoundHttpException;
use yii\web\Response;

class ModuleController extends \yii\web\Controller
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
        $searchModel = new ModuleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Module();
        
        // Fetch the list of available courses
        $courseList = Course::find()->select(['course_name', 'id'])->indexBy('id')->column();
      
        if ($model->load(Yii::$app->request->post())) {
            // Get the selected course_id from the form
            $selectedCourseId = Yii::$app->request->post('Module')['course_name'];
    
            // Assign the selected course_id to the model's attribute
            $model->course_id = $selectedCourseId;
    
            if ($model->save()) {
                return $this->redirect(['index']); // Redirect to the module listing page
            }
        }
    
        return $this->render('create', [
            'model' => $model,
            'courseList' => $courseList, // Pass the course list to the view
        ]);
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
        if (($model = Module::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
