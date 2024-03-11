<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Biblio $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="biblio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'frameworkcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'medium')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'subtitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'part_number')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'part_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'unititle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'serial')->textInput() ?>

    <?= $form->field($model, 'seriestitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'copyrightdate')->textInput() ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'datecreated')->textInput() ?>

    <?= $form->field($model, 'abstract')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
