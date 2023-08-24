<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "module".
 *
 * @property int $id
 * @property string $module_name
 * @property int $course_id
 * @property string|null $created_at
 * @property string $update_at
 */
class Module extends \yii\db\ActiveRecord
{
    public $course_name;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'module';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['module_name', 'course_id'], 'required'],
            [['course_id'], 'integer'],
            [['created_at', 'update_at'], 'safe'],
            [['module_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'module_name' => 'Module Name',
            'course_id' => 'Course ID',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }
}
