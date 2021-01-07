<?php

namespace common\models\query;

use yii\db\ActiveQuery;

class EkspedisiQuery extends ActiveQuery
{
    public function all($db = null)
    {
        return parent::all($db);
    }

    public function one($db = null)
    {
        return parent::one($db);
    }
}
