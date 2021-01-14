<?php

namespace common\models;

use yii\db\ActiveRecord;

class Location extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%location}}';
    }

    public function rules()
    {
        return [
            ['kota', 'required']
        ];
    }

    public function attributeLabels()
    {
        return [
            'kota' => 'Kota Asal'
        ];
    }

    public function getNamaKota()
    {
        return [
            1 => 'Bandung',
            2 => 'Jakarta',
            3 => 'Semarang'
        ];
    }
}
