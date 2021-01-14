<?php

use yii\helpers\Html;

$this->title = 'Tambah Ekspedisi';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>
