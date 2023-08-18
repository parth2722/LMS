<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Classs;

/**
 * UserSearch represents the model behind the search form of `backend\modules\super\models\User`.
 */
class ClassSearch extends Classs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','module_id'],'integer'], // Attribute 'id' is an integer
            [['class_name','file','file_path'], 'string'], // Attribute 'course_name' is a string
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'safe'], // These attributes are safe for search, use 'safe' validator
        ];
    }


    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Classs::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
          
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
          
            'file_path' => $this->file_path,
            'class_name' => $this->class_name,
            'module_id' => $this->module_id,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
          
            ->andFilterWhere(['like', 'file_path', $this->class_name])
            ->andFilterWhere(['like', 'class_name', $this->class_name])
            ->andFilterWhere(['like', 'module_id', $this->module_id]);
     

        return $dataProvider;
    }
}
