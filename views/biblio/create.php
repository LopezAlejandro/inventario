<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Biblio $model */

$this->title = 'Create Biblio';
$this->params['breadcrumbs'][] = ['label' => 'Biblios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biblio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
