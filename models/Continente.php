<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "continente".
 *
 * @property int $id
 * @property string $nome
 *
 * @property Pais[] $pais
 */
class Continente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'continente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome'], 'string', 'max' => 100],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasMany(Pais::className(), ['continente_id' => 'id']);
    }
}
