<?php

use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Reapz Ekspedisi';
?>

<div class="row">
    <div class="col-md-10">
        <div class="row">
            <h3>Reapz Ekspedisi</h3>
            <p>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create New', ['create'], ['class' => 'btn btn-info']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-import"></span> Import', ['import'], ['class' => 'btn btn-info']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-export"></span> Export Excel', ['export-excel'], ['class' => 'btn btn-info']) ?>
                <?= Html::a('<span class="glyphicon glyphicon-export"></span> Export PDF', ['export-pdf'], ['class' => 'btn btn-info']) ?>
            </p>
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
