<?php

namespace common\models;

use yii\db\ActiveRecord;

class Destination extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%destination}}';
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
            'kota' => 'Kota Tujuan'
        ];
    }
}
