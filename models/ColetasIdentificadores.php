<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coletas_identificadores".
 *
 * @property int $coletas_id
 * @property string $coletas_catalogo
 * @property int $coletores_id
 * @property string $data_identificacao
 *
 * @property Coletas $coletas
 * @property Coletores $coletores
 */
class ColetasIdentificadores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coletas_identificadores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coletas_id', 'coletas_catalogo', 'coletores_id', 'data_identificacao'], 'required'],
            [['coletas_id', 'coletores_id'], 'integer'],
            [['data_identificacao'], 'safe'],
            [['coletas_catalogo'], 'string', 'max' => 45],
            [['coletas_id', 'coletas_catalogo', 'coletores_id'], 'unique', 'targetAttribute' => ['coletas_id', 'coletas_catalogo', 'coletores_id']],
            [['coletas_id', 'coletas_catalogo'], 'exist', 'skipOnError' => true, 'targetClass' => Coletas::className(), 'targetAttribute' => ['coletas_id' => 'id', 'coletas_catalogo' => 'catalago']],
            [['coletores_id'], 'exist', 'skipOnError' => true, 'targetClass' => Coletores::className(), 'targetAttribute' => ['coletores_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'coletas_id' => 'Coletas ID',
            'coletas_catalogo' => 'Coletas Catalogo',
            'coletores_id' => 'Coletores ID',
            'data_identificacao' => 'Data Identificacao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColetas()
    {
        return $this->hasOne(Coletas::className(), ['id' => 'coletas_id', 'catalago' => 'coletas_catalogo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColetores()
    {
        return $this->hasOne(Coletores::className(), ['id' => 'coletores_id']);
    }
}
