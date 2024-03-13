<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Items */

$this->title = $model->itemnumber;
$this->params['breadcrumbs'][] = ['label' => 'Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Items'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model->itemnumber],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>
            
            <?= Html::a('Update', ['update', 'id' => $model->itemnumber], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->itemnumber], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'itemnumber',
        [
            'attribute' => 'biblionumber0.title',
            'label' => 'Biblionumber',
        ],
        [
            'attribute' => 'biblioitemnumber0.biblioitemnumber',
            'label' => 'Biblioitemnumber',
        ],
        'barcode',
        'dateaccessioned',
        'booksellerid:ntext',
        'homebranch',
        'price',
        'replacementprice',
        'replacementpricedate',
        'datelastborrowed',
        'datelastseen',
        'stack',
        'notforloan',
        'damaged',
        'damaged_on',
        'itemlost',
        'itemlost_on',
        'withdrawn',
        'withdrawn_on',
        'itemcallnumber',
        'coded_location_qualifier',
        'issues',
        'renewals',
        'reserves',
        'restricted',
        'itemnotes:ntext',
        'itemnotes_nonpublic:ntext',
        'holdingbranch',
        'timestamp',
        'deleted_on',
        'location',
        'permanent_location',
        'onloan',
        'cn_source',
        'cn_sort',
        'ccode',
        'materials:ntext',
        'uri:ntext',
        'itype',
        'more_subfields_xml:ntext',
        'enumchron:ntext',
        'copynumber',
        'stocknumber',
        'new_status',
        'exclude_from_local_holds_priority',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Biblioitems<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBiblioitems = [
        [
            'attribute' => 'biblionumber0.title',
            'label' => 'Biblionumber',
        ],
        'volume',
        'number',
        'itemtype',
        'isbn',
        'issn',
        'ean',
        'publicationyear',
        'publishercode',
        'volumedate',
        'volumedesc',
        'collectiontitle',
        'collectionissn',
        'collectionvolume',
        'editionstatement',
        'editionresponsibility',
        'timestamp',
        'illus',
        'pages',
        'notes',
        'size',
        'place',
        'lccn',
        'url',
        'cn_source',
        'cn_class',
        'cn_item',
        'cn_suffix',
        'cn_sort',
        'agerestriction',
        'totalissues',
    ];
    echo DetailView::widget([
        'model' => $model->biblioitemnumber0,
        'attributes' => $gridColumnBiblioitems    ]);
    ?>
    <div class="row">
        <h4>Biblio<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnBiblio = [
        'frameworkcode',
        'author',
        'title',
        'medium',
        'subtitle',
        'part_number',
        'part_name',
        'unititle',
        'notes',
        'serial',
        'seriestitle',
        'copyrightdate',
        'timestamp',
        'datecreated',
        'abstract',
    ];
    echo DetailView::widget([
        'model' => $model->biblionumber0,
        'attributes' => $gridColumnBiblio    ]);
    ?>
</div>
