<?php

use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = 'Eskpedisi';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="form-group col-md-4">
        <?php echo $form->field($model, 'kota')->textInput() ?>
        <?php echo $form->field($model, 'berat')->input('number') ?>
    </div>
    <div class="col-md-8">
    </div>
</div>
<?php echo Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>


