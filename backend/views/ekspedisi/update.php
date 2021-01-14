<?php

use yii\helpers\Html;

$this->title = 'Edit #' . $model->id;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>
