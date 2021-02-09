<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagens_coletas".
 *
 * @property int $coletas_id
 * @property string $coletas_catalogo
 * @property int $tipo_imagem_id
 * @property string $descricao
 * @property resource $imagem
 * @property string $extencao
 * @property string $nome_imagem
 *
 * @property Coletas[] $coletas
 * @property Coletas $coletas0
 * @property TipoImagem $tipoImagem
 */
class ImagensColetas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagens_coletas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['coletas_id', 'coletas_catalogo', 'tipo_imagem_id', 'imagem'], 'required'],
            [['coletas_id', 'tipo_imagem_id'], 'integer'],
            [['imagem'], 'string'],
            [['coletas_catalogo', 'extencao', 'nome_imagem'], 'string', 'max' => 45],
            [['descricao'], 'string', 'max' => 100],
            [['coletas_id'], 'unique'],
            [['coletas_id', 'coletas_catalogo'], 'exist', 'skipOnError' => true, 'targetClass' => Coletas::className(), 'targetAttribute' => ['coletas_id' => 'id', 'coletas_catalogo' => 'catalago']],
            [['tipo_imagem_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoImagem::className(), 'targetAttribute' => ['tipo_imagem_id' => 'id']],
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
            'tipo_imagem_id' => 'Tipo Imagem ID',
            'descricao' => 'Descricao',
            'imagem' => 'Imagem',
            'extencao' => 'Extencao',
            'nome_imagem' => 'Nome Imagem',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColetas()
    {
        return $this->hasMany(Coletas::className(), ['imagem_id' => 'coletas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColetas0()
    {
        return $this->hasOne(Coletas::className(), ['id' => 'coletas_id', 'catalago' => 'coletas_catalogo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoImagem()
    {
        return $this->hasOne(TipoImagem::className(), ['id' => 'tipo_imagem_id']);
    }
}
