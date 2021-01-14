<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->email ?></p>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/ekspedisi']],
                    [
                        'label' => 'Input', 
                        'icon' => 'plus-square', 
                        'url' => '#',
                        'items' => [
                            ['label' => 'Manual', 'icon' => 'add', 'url' => ['create']],
                            ['label' => 'Import', 'icon' => 'import', 'url' => ['import']]
                        ]
                    ],
                    [
                        'label' => 'Export',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'to Excel', 'icon' => 'file-excel-o', 'url' => ['export-excel'],],
                            ['label' => 'to PDF', 'icon' => 'file-pdf-o', 'url' => ['export-pdf'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
