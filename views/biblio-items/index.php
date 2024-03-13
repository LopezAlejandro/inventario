<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\BiblioItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Biblio Items';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="biblio-items-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Biblio Items', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']) ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true
        ],
        'biblioitemnumber',
        [
                'attribute' => 'biblionumber',
                'label' => 'Biblionumber',
                'value' => function($model){                   
                    return $model->biblionumber0->title;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Biblio::find()->asArray()->all(), 'biblionumber', 'title'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Biblio', 'id' => 'grid-biblio-items-search-biblionumber']
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
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-biblio-items']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]) ,
        ],
    ]); ?>

</div>
