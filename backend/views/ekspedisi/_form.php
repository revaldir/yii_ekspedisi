<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="row">
    <?php $form = ActiveForm::begin() ?>
    <div class="col-md-4">
        <?= $form->field($model, 'kota')->textInput() ?>
        <?= $form->field($model, 'service_code')->dropDownList($model->getServiceLabels()) ?>
        <?= $form->field($model, 'berat')->input('number') ?>
        <?= $form->field($model, 'harga')->input('number') ?>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end() ?>
