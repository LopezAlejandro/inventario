<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Biblio'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Biblio Metadata'),
        'content' => $this->render('_dataBiblioMetadata', [
            'model' => $model,
            'row' => $model->biblioMetadatas,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Biblioitems'),
        'content' => $this->render('_dataBiblioitems', [
            'model' => $model,
            'row' => $model->biblioitems,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Items'),
        'content' => $this->render('_dataItems', [
            'model' => $model,
            'row' => $model->items,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
    ],
]);
?>
