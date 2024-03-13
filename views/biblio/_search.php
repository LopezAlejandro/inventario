<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BiblioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-biblio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'biblionumber')->textInput(['placeholder' => 'Biblionumber']) ?>

    <?= $form->field($model, 'frameworkcode')->textInput(['maxlength' => true, 'placeholder' => 'Frameworkcode']) ?>

    <?= $form->field($model, 'author')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'medium')->textarea(['rows' => 6]) ?>

    <?php /* echo $form->field($model, 'subtitle')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'part_number')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'part_name')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'unititle')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'notes')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'serial')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'seriestitle')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'copyrightdate')->textInput(['placeholder' => 'Copyrightdate']) */ ?>

    <?php /* echo $form->field($model, 'timestamp')->textInput(['placeholder' => 'Timestamp']) */ ?>

    <?php /* echo $form->field($model, 'datecreated')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Datecreated',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'abstract')->textarea(['rows' => 6]) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
