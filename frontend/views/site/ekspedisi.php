<?php

use common\models\Destination;
use common\models\Location;
use yii\bootstrap\ActiveForm;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = 'Eskpedisi';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="form-group col-md-4">
        <?= $form->field($location, 'kota')->dropDownList(ArrayHelper::map(Location::find()->all(), 'id', 'kota'), ['prompt' => 'Pilih Kota']) ?>
        <?= $form->field($destination, 'kota')->dropDownList(ArrayHelper::map(Destination::find()->all(), 'id', 'kota'), ['prompt' => 'Pilih Kota']) ?>
        <?= Html::label('Berat (kg)') ?>
        <?= Html::input('number', 'Berat', '', ['placeholder' => 'Masukkan berat', 'class' => 'form-control', 'step' => '0.1']) ?>
    </div>
    <div class="col-md-8">
    </div>
</div>
<?php echo Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>


