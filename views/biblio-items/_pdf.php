<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\BiblioItems */

$this->title = $model->biblioitemnumber;
$this->params['breadcrumbs'][] = ['label' => 'Biblio Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biblio-items-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Biblio Items'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'biblioitemnumber',
        [
                'attribute' => 'biblionumber0.title',
                'label' => 'Biblionumber'
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
    
    <div class="row">
<?php
if($providerItems->totalCount){
    $gridColumnItems = [
        ['class' => 'yii\grid\SerialColumn'],
        'itemnumber',
        [
                'attribute' => 'biblionumber0.title',
                'label' => 'Biblionumber'
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode('Items'),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnItems
    ]);
}
?>
    </div>
</div>
