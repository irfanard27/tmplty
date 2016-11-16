<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Galeri;

/**
* GaleriSearch represents the model behind the search form about `backend\models\Galeri`.
*/
class GaleriSearch extends Galeri
{
/**
* @inheritdoc
*/
public function rules()
{
return [
[['id', 'nama', 'harga', 'ha'], 'integer'],
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
$query = Galeri::find();

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
            'nama' => $this->nama,
            'harga' => $this->harga,
            'ha' => $this->ha,
        ]);

return $dataProvider;
}
}