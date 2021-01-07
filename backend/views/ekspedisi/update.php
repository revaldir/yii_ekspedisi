<?php

use yii\helpers\Html;

$this->title = 'Update #' . $model->id;
?>

<div class="container">
    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model
    ]) ?>
</div>
