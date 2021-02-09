<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pais".
 *
 * @property int $id
 * @property string $nome
 * @property int $continente_id
 *
 * @property Estado[] $estados
 * @property Continente $continente
 */
class Pais extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['continente_id'], 'required'],
            [['continente_id'], 'integer'],
            [['nome'], 'string', 'max' => 100],
            [['continente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Continente::className(), 'targetAttribute' => ['continente_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'continente_id' => 'Continente ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstados()
    {
        return $this->hasMany(Estado::className(), ['pais_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContinente()
    {
        return $this->hasOne(Continente::className(), ['id' => 'continente_id']);
    }
}
