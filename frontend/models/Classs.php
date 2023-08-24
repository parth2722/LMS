<?php

namespace frontend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "class".
 *
 * @property int $id
 * @property string|null $file_path
 * @property string $class_name
 * @property int $module_id
 * @property string|null $created_at
 * @property string $updated_at
 */
class Classs extends \yii\db\ActiveRecord
{
    public $file;

    public $class_id;

    public $course_id;

    public $course_name;

    public $module_name;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'class';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['class_name', 'file_path', 'module_id'], 'safe'],
            [['module_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['class_name'], 'string', 'max' => 50],
            [['file'], 'file'],
            [['file_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_path' => 'File_Path',
            'class_name' => 'Class Name',
            'module_id' => 'Module ID',
            'created_at' => 'Created At',
            'updated_at' => 'Update At',
        ];
    }
}
