<?php

use yii\helpers\Html;

$this->title = 'Tambah Ekspedisi';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <h3><?= Html::encode($this->title) ?></h3>
    
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>
