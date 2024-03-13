<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BiblioItems */

$this->title = 'Create Biblio Items';
$this->params['breadcrumbs'][] = ['label' => 'Biblio Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="biblio-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
