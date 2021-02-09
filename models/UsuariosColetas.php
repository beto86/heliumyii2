<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios_coletas".
 *
 * @property int $usuarios_id
 * @property int $coletas_id
 * @property string $coletas_catalago
 *
 * @property Coletas $coletas
 * @property TbUsuario $usuarios
 */
class UsuariosColetas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios_coletas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuarios_id', 'coletas_id', 'coletas_catalago'], 'required'],
            [['usuarios_id', 'coletas_id'], 'integer'],
            [['coletas_catalago'], 'string', 'max' => 45],
            [['usuarios_id', 'coletas_id', 'coletas_catalago'], 'unique', 'targetAttribute' => ['usuarios_id', 'coletas_id', 'coletas_catalago']],
            [['coletas_id', 'coletas_catalago'], 'exist', 'skipOnError' => true, 'targetClass' => Coletas::className(), 'targetAttribute' => ['coletas_id' => 'id', 'coletas_catalago' => 'catalago']],
            [['usuarios_id'], 'exist', 'skipOnError' => true, 'targetClass' => TbUsuario::className(), 'targetAttribute' => ['usuarios_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usuarios_id' => 'Usuarios ID',
            'coletas_id' => 'Coletas ID',
            'coletas_catalago' => 'Coletas Catalago',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColetas()
    {
        return $this->hasOne(Coletas::className(), ['id' => 'coletas_id', 'catalago' => 'coletas_catalago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasOne(TbUsuario::className(), ['id' => 'usuarios_id']);
    }
}
