<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\BiblioItems */

?>
<div class="biblio-items-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->biblioitemnumber) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'biblioitemnumber',
        [
            'attribute' => 'biblionumber0.title',
            'label' => 'Biblionumber',
        ],
        'volume:ntext',
        'number:ntext',
        'itemtype',
        'isbn:ntext',
        'issn:ntext',
        'ean:ntext',
        'publicationyear:ntext',
        'publishercode',
        'volumedate',
        'volumedesc:ntext',
        'collectiontitle:ntext',
        'collectionissn:ntext',
        'collectionvolume:ntext',
        'editionstatement:ntext',
        'editionresponsibility:ntext',
        'timestamp',
        'illus',
        'pages',
        'notes:ntext',
        'size',
        'place',
        'lccn:ntext',
        'url:ntext',
        'cn_source',
        'cn_class',
        'cn_item',
        'cn_suffix',
        'cn_sort',
        'agerestriction',
        'totalissues',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>