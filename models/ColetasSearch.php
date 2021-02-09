<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Coletas;

/**
 * ColetasSearch represents the model behind the search form of `app\models\Coletas`.
 */
class ColetasSearch extends Coletas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'num_coleta'], 'integer'],
            [['catalago', 'coletores_id', 'localidade_id', 'cidade_id', 'comentarios', 'data_coleta', 'habitat', 'plant_reino', 'plant_fila', 'plant_familia', 'plant_genero', 'status'], 'safe'],
            //[['status'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Coletas::find();
        $query->leftjoin('coletores', 'coletores.id=coletas.coletores_id');
        //$query->leftjoin('localidade', 'localidade.id=coletas.localidade_id');
        //$query->leftjoin('cidade', 'cidade.id=coletas.cidade_id');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'coletores_id' => $this->coletores_id,
            'num_coleta' => $this->num_coleta,
            'data_coleta' => $this->data_coleta,
            //'localidade_id' => $this->localidade_id,
            //'cidade_id' => $this->cidade_id,
            //'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'catalago', $this->catalago])
            ->andFilterWhere(['like', 'comentarios', $this->comentarios])
            ->andFilterWhere(['like', 'habitat', $this->habitat])
            ->andFilterWhere(['like', 'plant_reino', $this->plant_reino])
            ->andFilterWhere(['like', 'plant_fila', $this->plant_fila])
            ->andFilterWhere(['like', 'plant_familia', $this->plant_familia])
            ->andFilterWhere(['like', 'plant_genero', $this->plant_genero])
            ->andFilterWhere(['like', 'coletores.nome_completo', $this->coletores_id]);
            //->andFilterWhere(['like', 'localidade.local', $this->localidade_id]);
            //->andFilterWhere(['like', 'cidade.nome', $this->cidade_id]);

        return $dataProvider;
    }
}
