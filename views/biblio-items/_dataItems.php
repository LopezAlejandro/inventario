<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->items,
        'key' => 'itemnumber'
    ]);
    $gridColumns = [
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
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'items'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
