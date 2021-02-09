<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coletas".
 *
 * @property int $id
 * @property string $catalago
 * @property int $coletores_id
 * @property int $num_coleta
 * @property string $comentarios
 * @property string $data_coleta
 * @property string $habitat
 * @property int $localidade_id
 * @property int $cidade_id
 * @property string $plant_reino
 * @property string $plant_fila
 * @property string $plant_familia
 * @property string $plant_genero
 * @property bool $status
 * @property int $imagem_id
 *
 * @property Cidade $cidade
 * @property Coletores $coletores
 * @property ImagensColetas $imagem
 * @property Localidade $localidade
 * @property ColetasIdentificadores[] $coletasIdentificadores
 * @property Coletores[] $coletores0
 * @property ImagensColetas[] $imagensColetas
 * @property UsuariosColetas[] $usuariosColetas
 * @property TbUsuario[] $usuarios
 */
class Coletas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coletas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catalago', 'coletores_id', 'data_coleta', 'habitat', 'localidade_id', 'cidade_id'], 'required'],
            [['coletores_id', 'num_coleta', 'localidade_id', 'cidade_id', 'imagem_id'], 'integer'],
            [['data_coleta'], 'safe'],
            [['status'], 'boolean'],
            [['catalago'], 'string', 'max' => 45],
            [['comentarios'], 'string', 'max' => 255],
            [['habitat', 'plant_reino', 'plant_fila', 'plant_familia', 'plant_genero'], 'string', 'max' => 100],
            [['catalago'], 'unique'],
            [['num_coleta'], 'unique'],
            [['cidade_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cidade::className(), 'targetAttribute' => ['cidade_id' => 'id']],
            [['coletores_id'], 'exist', 'skipOnError' => true, 'targetClass' => Coletores::className(), 'targetAttribute' => ['coletores_id' => 'id']],
            [['imagem_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImagensColetas::className(), 'targetAttribute' => ['imagem_id' => 'coletas_id']],
            [['localidade_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidade::className(), 'targetAttribute' => ['localidade_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catalago' => 'Catalago',
            'coletores_id' => 'Coletores',
            'num_coleta' => 'Num. Coleta',
            'comentarios' => 'Comentarios',
            'data_coleta' => 'Data Coleta',
            'habitat' => 'Habitat',
            'localidade_id' => 'Localidade',
            'cidade_id' => 'Cidade',
            'plant_reino' => 'Reino',
            'plant_fila' => 'Fila',
            'plant_familia' => 'Familia',
            'plant_genero' => 'Genero',
            'status' => 'Status',
            'imagem_id' => 'Imagem',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCidade()
    {
        return $this->hasOne(Cidade::className(), ['id' => 'cidade_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColetores()
    {
        return $this->hasOne(Coletores::className(), ['id' => 'coletores_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagem()
    {
        return $this->hasOne(ImagensColetas::className(), ['coletas_id' => 'imagem_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalidade()
    {
        return $this->hasOne(Localidade::className(), ['id' => 'localidade_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColetasIdentificadores()
    {
        return $this->hasMany(ColetasIdentificadores::className(), ['coletas_id' => 'id', 'coletas_catalogo' => 'catalago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColetores0()
    {
        return $this->hasMany(Coletores::className(), ['id' => 'coletores_id'])->viaTable('coletas_identificadores', ['coletas_id' => 'id', 'coletas_catalogo' => 'catalago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImagensColetas()
    {
        return $this->hasMany(ImagensColetas::className(), ['coletas_id' => 'id', 'coletas_catalogo' => 'catalago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuariosColetas()
    {
        return $this->hasMany(UsuariosColetas::className(), ['coletas_id' => 'id', 'coletas_catalago' => 'catalago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(TbUsuario::className(), ['id' => 'usuarios_id'])->viaTable('usuarios_coletas', ['coletas_id' => 'id', 'coletas_catalago' => 'catalago']);
    }
}
