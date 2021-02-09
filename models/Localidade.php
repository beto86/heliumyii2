<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "localidade".
 *
 * @property int $id
 * @property string $local
 * @property string $desc_especifica
 * @property string $altitude
 * @property string $latitude
 * @property string $longitude
 *
 * @property Coletas[] $coletas
 */
class Localidade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'localidade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['local'], 'string', 'max' => 100],
            [['desc_especifica'], 'string', 'max' => 255],
            [['altitude', 'latitude', 'longitude'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'local' => 'Local',
            'desc_especifica' => 'Desc Especifica',
            'altitude' => 'Altitude',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColetas()
    {
        return $this->hasMany(Coletas::className(), ['localidade_id' => 'id']);
    }
}
