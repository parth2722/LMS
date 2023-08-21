<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "class".
 *
 * @property int $id
 * @property string $file
 * @property string $class_name
 * @property int $module_id
 * @property string|null $created_at
 * @property string $update_at
 */
class Classs extends \yii\db\ActiveRecord
{
    public $file;

    public $file_type;



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
            [['file_path', 'class_name', 'module_id'], 'required'],
            [['module_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['class_name'], 'string', 'max' => 50],
            [['file'], 'file'],
            [['file_path'], 'string', 'max' => 255], // Add validation for the new file_path column
        ];
    }




    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',

            'file_path' => 'file_path',
            'class_name' => 'Class Name',
            'module_id' => 'Module ID',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }
}
