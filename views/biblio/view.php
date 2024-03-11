<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Biblio $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Biblios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="biblio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'biblionumber' => $model->biblionumber], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'biblionumber' => $model->biblionumber], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
