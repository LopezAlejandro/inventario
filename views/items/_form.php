<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Items */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'itemnumber')->textInput(['placeholder' => 'Itemnumber']) ?>

    <?= $form->field($model, 'biblionumber')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Biblio::find()->orderBy('biblionumber')->asArray()->all(), 'biblionumber', 'title'),
        'options' => ['placeholder' => 'Choose Biblio'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'biblioitemnumber')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Biblioitems::find()->orderBy('biblioitemnumber')->asArray()->all(), 'biblioitemnumber', 'biblioitemnumber'),
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

    <?= $form->field($model, 'booksellerid')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'homebranch')->textInput(['maxlength' => true, 'placeholder' => 'Homebranch']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true, 'placeholder' => 'Price']) ?>

    <?= $form->field($model, 'replacementprice')->textInput(['maxlength' => true, 'placeholder' => 'Replacementprice']) ?>

    <?= $form->field($model, 'replacementpricedate')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Replacementpricedate',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'datelastborrowed')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Datelastborrowed',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'datelastseen')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Datelastseen',
                'autoclose' => true,
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'stack')->checkbox() ?>

    <?= $form->field($model, 'notforloan')->checkbox() ?>

    <?= $form->field($model, 'damaged')->checkbox() ?>

    <?= $form->field($model, 'damaged_on')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Damaged On',
                'autoclose' => true,
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'itemlost')->checkbox() ?>

    <?= $form->field($model, 'itemlost_on')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Itemlost On',
                'autoclose' => true,
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'withdrawn')->checkbox() ?>

    <?= $form->field($model, 'withdrawn_on')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Withdrawn On',
                'autoclose' => true,
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'itemcallnumber')->textInput(['maxlength' => true, 'placeholder' => 'Itemcallnumber']) ?>

    <?= $form->field($model, 'coded_location_qualifier')->textInput(['maxlength' => true, 'placeholder' => 'Coded Location Qualifier']) ?>

    <?= $form->field($model, 'issues')->textInput(['placeholder' => 'Issues']) ?>

    <?= $form->field($model, 'renewals')->textInput(['placeholder' => 'Renewals']) ?>

    <?= $form->field($model, 'reserves')->textInput(['placeholder' => 'Reserves']) ?>

    <?= $form->field($model, 'restricted')->checkbox() ?>

    <?= $form->field($model, 'itemnotes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'itemnotes_nonpublic')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'holdingbranch')->textInput(['maxlength' => true, 'placeholder' => 'Holdingbranch']) ?>

    <?= $form->field($model, 'timestamp')->textInput(['placeholder' => 'Timestamp']) ?>

    <?= $form->field($model, 'deleted_on')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
        'saveFormat' => 'php:Y-m-d H:i:s',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Deleted On',
                'autoclose' => true,
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true, 'placeholder' => 'Location']) ?>

    <?= $form->field($model, 'permanent_location')->textInput(['maxlength' => true, 'placeholder' => 'Permanent Location']) ?>

    <?= $form->field($model, 'onloan')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Onloan',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'cn_source')->textInput(['maxlength' => true, 'placeholder' => 'Cn Source']) ?>

    <?= $form->field($model, 'cn_sort')->textInput(['maxlength' => true, 'placeholder' => 'Cn Sort']) ?>

    <?= $form->field($model, 'ccode')->textInput(['maxlength' => true, 'placeholder' => 'Ccode']) ?>

    <?= $form->field($model, 'materials')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'uri')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'itype')->textInput(['maxlength' => true, 'placeholder' => 'Itype']) ?>

    <?= $form->field($model, 'more_subfields_xml')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'enumchron')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'copynumber')->textInput(['maxlength' => true, 'placeholder' => 'Copynumber']) ?>

    <?= $form->field($model, 'stocknumber')->textInput(['maxlength' => true, 'placeholder' => 'Stocknumber']) ?>

    <?= $form->field($model, 'new_status')->textInput(['maxlength' => true, 'placeholder' => 'New Status']) ?>

    <?= $form->field($model, 'exclude_from_local_holds_priority')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
