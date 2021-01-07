<?php

namespace frontend\models;

use common\models\Ekspedisi;

class EkspedisiSearch extends Ekspedisi
{
    public function rules()
    {
        return [
            [['kota', 'berat'], 'required']
        ];
    }
}
