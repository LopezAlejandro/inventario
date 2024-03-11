<?php

use app\models\Biblio;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\BiblioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Biblios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biblio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Biblio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'biblionumber',
            'frameworkcode',
            'author:ntext',
            'title:ntext',
            'medium:ntext',
            //'subtitle:ntext',
            //'part_number:ntext',
            //'part_name:ntext',
            //'unititle:ntext',
            //'notes:ntext',
            //'serial',
            //'seriestitle:ntext',
            //'copyrightdate',
            //'timestamp',
            //'datecreated',
            //'abstract:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Biblio $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'biblionumber' => $model->biblionumber]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
