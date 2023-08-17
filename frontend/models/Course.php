<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $course_name
 * @property string|null $created_at
 * @property string $update_at
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_name'], 'required'],
            [['created_at', 'update_at'], 'safe'],
            [['course_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_name' => 'Course Name',
            'created_at' => 'Created At',
            'update_at' => 'Update At',
        ];
    }
}
