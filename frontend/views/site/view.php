<?php

use common\models\Location;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Ekspedisi';
$this->params['breadcrumbs'][]= $this->title;
?>

<div class="row">
    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-4">
        <?= $form->field($location, 'kota')->dropDownList([ArrayHelper::map(Location::find()->all(), 'id', 'kota')], ['prompt' => 'Pilih Kota Asal']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <div class="col-md-8">
        <?= $price ?>
    </div>
</div>
