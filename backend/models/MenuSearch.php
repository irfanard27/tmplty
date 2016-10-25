<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Menu;

/**
* MenuSearch represents the model behind the search form about `app\models\Menu`.
*/
class MenuSearch extends Menu
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id'], 'integer'],
            [['menu', 'icon', 'parent', 'module', 'controller'], 'safe'],
];
}

/**
* @inheritdoc
*/
public function scenarios()
{
// bypass scenarios() implementation in the parent class
return Model::scenarios();
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
$query = Menu::find();

$dataProvider = new ActiveDataProvider([
'query' => $query,
]);

$this->load($params);

if (!$this->validate()) {
// uncomment the following line if you do not want to any records when validation fails
// $query->where('0=1');
return $dataProvider;
}

$query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'menu', $this->menu])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'parent', $this->parent])
            ->andFilterWhere(['like', 'module', $this->module])
            ->andFilterWhere(['like', 'controller', $this->controller]);

return $dataProvider;
}
}