<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_tipo_usuario".
 *
 * @property int $id
 * @property string $descricao
 *
 * @property TbUsuario[] $tbUsuarios
 */
class TbTipoUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_tipo_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao'], 'required'],
            [['descricao'], 'string', 'max' => 255],
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
    public function getTbUsuarios()
    {
        return $this->hasMany(TbUsuario::className(), ['tb_tipo_usuario_id' => 'id']);
    }
}
