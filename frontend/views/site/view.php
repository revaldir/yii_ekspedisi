<?php

use yii\grid\GridView;
use yii\widgets\ActiveForm;

$this->title = 'Ekspedisi';
?>

<div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-4">
        <?= $form->field($model, 'kota')->textInput() ?>
        <?= $form->field($model, 'berat')->textInput() ?>
    </div>
    <?php ActiveForm::end(); ?>
    <div class="col-md-8">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'kota',
                [
                    'attribute' => 'service_code',
                    'content' => function($model) {
                        return $model->getServiceLabels()[$model->service_code];
                    }
                ],
                [
                    'attribute' => 'harga',
                    'content' => function($model) {
                        return 'Rp '.number_format($model->harga, 0, ',', '.');
                    }
                ]
            ]
        ]) ?>
    </div>
</div>
