<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ItemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'itemnumber')->textInput(['placeholder' => 'Itemnumber']) ?>

    <?= $form->field($model, 'biblionumber')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Biblio::find()->orderBy('biblionumber')->asArray()->all(), 'biblionumber', 'title'),
        'options' => ['placeholder' => 'Choose Biblio'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'biblioitemnumber')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\BiblioItems::find()->orderBy('biblioitemnumber')->asArray()->all(), 'biblioitemnumber', 'biblioitemnumber'),
        'options' => ['placeholder' => 'Choose Biblioitems'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'barcode')->textInput(['maxlength' => true, 'placeholder' => 'Barcode']) ?>

    <?= $form->field($model, 'dateaccessioned')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Dateaccessioned',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?php /* echo $form->field($model, 'booksellerid')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'homebranch')->textInput(['maxlength' => true, 'placeholder' => 'Homebranch']) */ ?>

    <?php /* echo $form->field($model, 'price')->textInput(['maxlength' => true, 'placeholder' => 'Price']) */ ?>

    <?php /* echo $form->field($model, 'replacementprice')->textInput(['maxlength' => true, 'placeholder' => 'Replacementprice']) */ ?>

    <?php /* echo $form->field($model, 'replacementpricedate')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Replacementpricedate',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'datelastborrowed')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Datelastborrowed',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'datelastseen')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Datelastseen',
                'autoclose' => true,
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'stack')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'notforloan')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'damaged')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'damaged_on')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Damaged On',
                'autoclose' => true,
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'itemlost')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'itemlost_on')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Itemlost On',
                'autoclose' => true,
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'withdrawn')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'withdrawn_on')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Withdrawn On',
                'autoclose' => true,
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'itemcallnumber')->textInput(['maxlength' => true, 'placeholder' => 'Itemcallnumber']) */ ?>

    <?php /* echo $form->field($model, 'coded_location_qualifier')->textInput(['maxlength' => true, 'placeholder' => 'Coded Location Qualifier']) */ ?>

    <?php /* echo $form->field($model, 'issues')->textInput(['placeholder' => 'Issues']) */ ?>

    <?php /* echo $form->field($model, 'renewals')->textInput(['placeholder' => 'Renewals']) */ ?>

    <?php /* echo $form->field($model, 'reserves')->textInput(['placeholder' => 'Reserves']) */ ?>

    <?php /* echo $form->field($model, 'restricted')->checkbox() */ ?>

    <?php /* echo $form->field($model, 'itemnotes')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'itemnotes_nonpublic')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'holdingbranch')->textInput(['maxlength' => true, 'placeholder' => 'Holdingbranch']) */ ?>

    <?php /* echo $form->field($model, 'timestamp')->textInput(['placeholder' => 'Timestamp']) */ ?>

    <?php /* echo $form->field($model, 'deleted_on')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Deleted On',
                'autoclose' => true,
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'location')->textInput(['maxlength' => true, 'placeholder' => 'Location']) */ ?>

    <?php /* echo $form->field($model, 'permanent_location')->textInput(['maxlength' => true, 'placeholder' => 'Permanent Location']) */ ?>

    <?php /* echo $form->field($model, 'onloan')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Onloan',
                'autoclose' => true
            ]
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'cn_source')->textInput(['maxlength' => true, 'placeholder' => 'Cn Source']) */ ?>

    <?php /* echo $form->field($model, 'cn_sort')->textInput(['maxlength' => true, 'placeholder' => 'Cn Sort']) */ ?>

    <?php /* echo $form->field($model, 'ccode')->textInput(['maxlength' => true, 'placeholder' => 'Ccode']) */ ?>

    <?php /* echo $form->field($model, 'materials')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'uri')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'itype')->textInput(['maxlength' => true, 'placeholder' => 'Itype']) */ ?>

    <?php /* echo $form->field($model, 'more_subfields_xml')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'enumchron')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'copynumber')->textInput(['maxlength' => true, 'placeholder' => 'Copynumber']) */ ?>

    <?php /* echo $form->field($model, 'stocknumber')->textInput(['maxlength' => true, 'placeholder' => 'Stocknumber']) */ ?>

    <?php /* echo $form->field($model, 'new_status')->textInput(['maxlength' => true, 'placeholder' => 'New Status']) */ ?>

    <?php /* echo $form->field($model, 'exclude_from_local_holds_priority')->checkbox() */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
