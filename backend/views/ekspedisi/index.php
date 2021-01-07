<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Reapz Ekspedisi';
?>

<div class="row">
    <div class="col-md-10">
        <div class="row">
            <div class="col-sm-10">
                <h3>Reapz Ekspedisi</h3>
            </div>
            <div class="col-sm-2">
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create New', ['create'], ['class' => 'btn btn-info']) ?>
            </div>
        </div>


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
    <div class="col-md-2">
    
    </div>
</div>
