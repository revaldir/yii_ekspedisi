<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Reapz Ekspedisi';
?>

<div class="box box-danger">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'kota',
            [
                'attribute' => 'service_code',
                'content' => function($model) {
                    return $model->getServiceLabels()[$model->service_code];
                }
            ],
            'berat',
            [
                'attribute' => 'harga',
                'content' => function($model) {
                    return 'Rp '.number_format($model->harga, 0, ',', '.');
                }
            ],

            ['class' => 'yii\grid\ActionColumn']
        ]
    ]) ?>
</div>
