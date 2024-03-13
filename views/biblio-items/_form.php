<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BiblioItems */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Items', 
        'relID' => 'items', 
        'value' => \yii\helpers\Json::encode($model->items),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="biblio-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

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

    <?= $form->field($model, 'isbn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'issn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ean')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publicationyear')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publishercode')->textInput(['maxlength' => true, 'placeholder' => 'Publishercode']) ?>

    <?= $form->field($model, 'volumedate')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Volumedate',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'volumedesc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'collectiontitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'collectionissn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'collectionvolume')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'editionstatement')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'editionresponsibility')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'timestamp')->textInput(['placeholder' => 'Timestamp']) ?>

    <?= $form->field($model, 'illus')->textInput(['maxlength' => true, 'placeholder' => 'Illus']) ?>

    <?= $form->field($model, 'pages')->textInput(['maxlength' => true, 'placeholder' => 'Pages']) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'size')->textInput(['maxlength' => true, 'placeholder' => 'Size']) ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => true, 'placeholder' => 'Place']) ?>

    <?= $form->field($model, 'lccn')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cn_source')->textInput(['maxlength' => true, 'placeholder' => 'Cn Source']) ?>

    <?= $form->field($model, 'cn_class')->textInput(['maxlength' => true, 'placeholder' => 'Cn Class']) ?>

    <?= $form->field($model, 'cn_item')->textInput(['maxlength' => true, 'placeholder' => 'Cn Item']) ?>

    <?= $form->field($model, 'cn_suffix')->textInput(['maxlength' => true, 'placeholder' => 'Cn Suffix']) ?>

    <?= $form->field($model, 'cn_sort')->textInput(['maxlength' => true, 'placeholder' => 'Cn Sort']) ?>

    <?= $form->field($model, 'agerestriction')->textInput(['maxlength' => true, 'placeholder' => 'Agerestriction']) ?>

    <?= $form->field($model, 'totalissues')->textInput(['placeholder' => 'Totalissues']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Items'),
            'content' => $this->render('_formItems', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->items),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
