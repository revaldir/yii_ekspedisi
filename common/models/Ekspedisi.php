<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Ekspedisi extends ActiveRecord
{
    // attribute for importFile
    public $importFile;

    // const for services
    const SERVICE_REGULAR = 1;
    const SERVICE_EXPRESS = 2;
    const SERVICE_INSTANT = 3;
    const SERVICE_YES = 4;

    public static function tableName()
    {
        return '{{%ekspedisi}}';
    }

    public function rules()
    {
        return [
            [['kota', 'service_code', 'berat', 'harga'], 'required'],
            [['harga', 'service_code', 'berat'], 'integer'],
            /** Import Data */
            ['importFile', 'file', 'extensions' => ['xls', 'xlsx']]
        ];
    }

    public function attributeLabels()
    {
        return [
            'kota' => 'Kota Tujuan',
            'service_code' => 'Service',
            'berat' => 'Berat (kg)',
            'harga' => 'Harga',
            'importFile' => 'Import File'
        ];
    }

    public function getServiceLabels()
    {
        return [
            self::SERVICE_REGULAR => 'Regular',
            self::SERVICE_EXPRESS => 'Express',
            self::SERVICE_INSTANT => 'Instant',
            self::SERVICE_YES => 'YES'
        ];
    }
}
