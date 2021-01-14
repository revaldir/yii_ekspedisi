<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Import Data from Excel';
$this->params['breadcrumbs'][] = $this->title;
?>

<p>
    <?= Html::a('Lihat Template', 'https://docs.google.com/spreadsheets/d/1oVI6j9l9vBnViHszmuktNphKwcLuIqvbNGo_Db7obJ0/edit?usp=sharing', ['target' => '_blank']) ?>
</p>

<?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?= $form->field($model, 'importFile')->label(false)->fileInput() ?>

<div class="form-group">
    <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
</div>
<?php ActiveForm::end() ?>
