<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BiblioItems */

$this->title = 'Update Biblio Items: ' . ' ' . $model->biblioitemnumber;
$this->params['breadcrumbs'][] = ['label' => 'Biblio Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->biblioitemnumber, 'url' => ['view', 'id' => $model->biblioitemnumber]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="biblio-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
