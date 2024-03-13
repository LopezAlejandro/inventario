<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Biblio */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Biblio', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biblio-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Biblio'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model->biblionumber],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>
            
            <?= Html::a('Update', ['update', 'id' => $model->biblionumber], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->biblionumber], [
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
        'biblionumber',
        'frameworkcode',
        'author:ntext',
        'title:ntext',
        'medium:ntext',
        'subtitle:ntext',
        'part_number:ntext',
        'part_name:ntext',
        'unititle:ntext',
        'notes:ntext',
        'serial',
        'seriestitle:ntext',
        'copyrightdate',
        'timestamp',
        'datecreated',
        'abstract:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerBiblioMetadata->totalCount){
    $gridColumnBiblioMetadata = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
                        'format',
            'schema',
            'metadata:ntext',
            'timestamp',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerBiblioMetadata,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-biblio-metadata']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Biblio Metadata'),
        ],
        'columns' => $gridColumnBiblioMetadata
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerBiblioitems->totalCount){
    $gridColumnBiblioitems = [
        ['class' => 'yii\grid\SerialColumn'],
            'biblioitemnumber',
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
    echo Gridview::widget([
        'dataProvider' => $providerBiblioitems,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-biblioitems']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Biblioitems'),
        ],
        'columns' => $gridColumnBiblioitems
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerItems->totalCount){
    $gridColumnItems = [
        ['class' => 'yii\grid\SerialColumn'],
            'itemnumber',
                        [
                'attribute' => 'biblioitemnumber0.biblioitemnumber',
                'label' => 'Biblioitemnumber'
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
    echo Gridview::widget([
        'dataProvider' => $providerItems,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-items']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Items'),
        ],
        'columns' => $gridColumnItems
    ]);
}
?>

    </div>
</div>
