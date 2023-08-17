<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Module;

/**
 * UserSearch represents the model behind the search form of `backend\modules\super\models\User`.
 */
class ModuleSearch extends Module
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','course_id'], 'integer'], // Attribute 'id' is an integer
            [['module_name'], 'string'], // Attribute 'course_name' is a string
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
        $query = Module::find();

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
            'course_id' => $this->module_name,
            'module_name' => $this->module_name,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'module_name', $this->module_name])
            ->andFilterWhere(['like', 'module_name', $this->module_name]);
     

        return $dataProvider;
    }
}
