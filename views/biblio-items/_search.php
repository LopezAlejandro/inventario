<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BiblioItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-biblio-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'biblioitemnumber')->textInput(['placeholder' => 'Biblioitemnumber']) ?>

    <?= $form->field($model, 'biblionumber')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Biblio::find()->orderBy('biblionumber')->asArray()->all(), 'biblionumber', 'title'),
        'options' => ['placeholder' => 'Choose Biblio'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'volume')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'number')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'itemtype')->textInput(['maxlength' => true, 'placeholder' => 'Itemtype']) ?>

    <?php /* echo $form->field($model, 'isbn')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'issn')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'ean')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'publicationyear')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'publishercode')->textInput(['maxlength' => true, 'placeholder' => 'Publishercode']) */ ?>

    <?php /* echo $form->field($model, 'volumedate')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Volumedate',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'volumedesc')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'collectiontitle')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'collectionissn')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'collectionvolume')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'editionstatement')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'editionresponsibility')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'timestamp')->textInput(['placeholder' => 'Timestamp']) */ ?>

    <?php /* echo $form->field($model, 'illus')->textInput(['maxlength' => true, 'placeholder' => 'Illus']) */ ?>

    <?php /* echo $form->field($model, 'pages')->textInput(['maxlength' => true, 'placeholder' => 'Pages']) */ ?>

    <?php /* echo $form->field($model, 'notes')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'size')->textInput(['maxlength' => true, 'placeholder' => 'Size']) */ ?>

    <?php /* echo $form->field($model, 'place')->textInput(['maxlength' => true, 'placeholder' => 'Place']) */ ?>

    <?php /* echo $form->field($model, 'lccn')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'url')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'cn_source')->textInput(['maxlength' => true, 'placeholder' => 'Cn Source']) */ ?>

    <?php /* echo $form->field($model, 'cn_class')->textInput(['maxlength' => true, 'placeholder' => 'Cn Class']) */ ?>

    <?php /* echo $form->field($model, 'cn_item')->textInput(['maxlength' => true, 'placeholder' => 'Cn Item']) */ ?>

    <?php /* echo $form->field($model, 'cn_suffix')->textInput(['maxlength' => true, 'placeholder' => 'Cn Suffix']) */ ?>

    <?php /* echo $form->field($model, 'cn_sort')->textInput(['maxlength' => true, 'placeholder' => 'Cn Sort']) */ ?>

    <?php /* echo $form->field($model, 'agerestriction')->textInput(['maxlength' => true, 'placeholder' => 'Agerestriction']) */ ?>

    <?php /* echo $form->field($model, 'totalissues')->textInput(['placeholder' => 'Totalissues']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
