<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Biblio */

?>
<div class="biblio-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->title) ?></h2>
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
</div>