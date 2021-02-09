<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_imagem".
 *
 * @property int $id
 * @property string $descricao
 *
 * @property ImagensColetas[] $imagensColetas
 */
class TipoImagem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_imagem';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descricao' => 'Descricao',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagensColetas()
    {
        return $this->hasMany(ImagensColetas::className(), ['tipo_imagem_id' => 'id']);
    }
}
