<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Items */

?>
<div class="items-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->itemnumber) ?></h2>
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
</div>