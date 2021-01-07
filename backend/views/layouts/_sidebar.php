<?php 
use yii\bootstrap\Nav;
?>

<aside>
    <?= Nav::widget([
        'options' => [
            'class' => 'd-flex flex-column nav-tabs nav-stacked'
        ],
        'items' => [
            [
                'label' => 'Home',
                'url' => ['/site/index']
            ],
            [
                'label' => 'Add New',
                'url' => ['/site/create']
            ]
        ]
    ]) ?>
</aside>
