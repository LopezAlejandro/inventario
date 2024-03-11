<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Biblio $model */

$this->title = 'Update Biblio: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Biblios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'biblionumber' => $model->biblionumber]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="biblio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
