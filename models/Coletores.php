<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coletores".
 *
 * @property int $id
 * @property string $nome_completo
 * @property string $nome_citacoes
 */
class Coletores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'coletores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_completo', 'nome_citacoes'], 'string', 'max' => 45],

            //[['role'], 'in' , ['admin', 'user']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome_completo' => 'Nome Completo',
            'nome_citacoes' => 'Nome Citacoes',
        ];
    }
}
