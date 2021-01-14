<?php

namespace common\models;

use yii\db\ActiveRecord;

class Price extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%price}}';
    }
}
