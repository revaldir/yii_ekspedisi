<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'Details of #' . $model->id;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-8">
        <p>
            <?= Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure?',
                    'method' => 'post'
                ]
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'options' => ['class' => 'table table-hover'],
            'attributes' => [
                [
                    'label' => '#',
                    'value' => $model->id
                ], 
                'kota', 
                [
                    'label' => 'Service',
                    'value' => function($model) {
                        return $model->getServiceLabels()[$model->service_code];
                    }
                ], 
                'berat', 
                [
                    'label' => 'Harga',
                    'value' => function($model) {
                        return 'Rp '.number_format($model->harga, 0, ',', '.');
                    }
                ]
            ]
        ]) ?>
    </div>
</div>
