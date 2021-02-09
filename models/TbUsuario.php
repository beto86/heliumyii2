<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tb_usuario".
 *
 * @property int $id
 * @property int $tb_tipo_usuario_id
 * @property string $nome
 * @property string $sobrenome
 * @property string $username
 * @property string $password
 * @property string $link_lattes
 * @property bool $status
 *
 * @property TbTipoUsuario $tbTipoUsuario
 */
class TbUsuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tb_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tb_tipo_usuario_id', 'nome', 'sobrenome', 'username', 'password'], 'required'],
            [['tb_tipo_usuario_id'], 'integer'],
            [['status'], 'boolean'],
            [['nome', 'sobrenome', 'username'], 'string', 'max' => 45],
            [['password', 'link_lattes'], 'string', 'max' => 255],
            [['tb_tipo_usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => TbTipoUsuario::className(), 'targetAttribute' => ['tb_tipo_usuario_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tb_tipo_usuario_id' => 'Tipo Usuario',
            'nome' => 'Nome',
            'sobrenome' => 'Sobrenome',
            'username' => 'Login',
            'password' => 'Senha',
            'link_lattes' => 'Link Lattes',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbTipoUsuario()
    {
        return $this->hasOne(TbTipoUsuario::className(), ['id' => 'tb_tipo_usuario_id']);
    }


    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\base\NotSupportedException();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        throw new \yii\base\NotSupportedException();
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function getTipoUsuarioId()
    {
        return $this->tb_tipo_usuario_id;
    }



}
