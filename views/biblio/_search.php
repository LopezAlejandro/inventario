<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BiblioSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="biblio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'biblionumber') ?>

    <?= $form->field($model, 'frameworkcode') ?>

    <?= $form->field($model, 'author') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'medium') ?>

    <?php // echo $form->field($model, 'subtitle') ?>

    <?php // echo $form->field($model, 'part_number') ?>

    <?php // echo $form->field($model, 'part_name') ?>

    <?php // echo $form->field($model, 'unititle') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'serial') ?>

    <?php // echo $form->field($model, 'seriestitle') ?>

    <?php // echo $form->field($model, 'copyrightdate') ?>

    <?php // echo $form->field($model, 'timestamp') ?>

    <?php // echo $form->field($model, 'datecreated') ?>

    <?php // echo $form->field($model, 'abstract') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
