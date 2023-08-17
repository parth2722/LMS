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
            [['file', 'class_name', 'module_id'], 'required'],
            [['module_id'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
            [['file', 'class_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'File',
            'class_name' => 'Class Name',
            'module_id' => 'Module ID',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }
}
