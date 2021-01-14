<?php

namespace common\models;

use yii\db\ActiveRecord;

class Transaction extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%transaction}}';
    }
}
