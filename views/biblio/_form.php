<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Biblio */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'BiblioMetadata', 
        'relID' => 'biblio-metadata', 
        'value' => \yii\helpers\Json::encode($model->biblioMetadatas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Biblioitems', 
        'relID' => 'biblioitems', 
        'value' => \yii\helpers\Json::encode($model->biblioitems),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Items', 
        'relID' => 'items', 
        'value' => \yii\helpers\Json::encode($model->items),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="biblio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'biblionumber')->textInput(['placeholder' => 'Biblionumber']) ?>

    <?= $form->field($model, 'frameworkcode')->textInput(['maxlength' => true, 'placeholder' => 'Frameworkcode']) ?>

    <?= $form->field($model, 'author')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'medium')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'subtitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'part_number')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'part_name')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'unititle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'serial')->checkbox() ?>

    <?= $form->field($model, 'seriestitle')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'copyrightdate')->textInput(['placeholder' => 'Copyrightdate']) ?>

    <?= $form->field($model, 'timestamp')->textInput(['placeholder' => 'Timestamp']) ?>

    <?= $form->field($model, 'datecreated')->widget(\kartik\datecontrol\DateControl::classname(), [
        'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
        'saveFormat' => 'php:Y-m-d',
        'ajaxConversion' => true,
        'options' => [
            'pluginOptions' => [
                'placeholder' => 'Choose Datecreated',
                'autoclose' => true
            ]
        ],
    ]); ?>

    <?= $form->field($model, 'abstract')->textarea(['rows' => 6]) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('BiblioMetadata'),
            'content' => $this->render('_formBiblioMetadata', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->biblioMetadatas),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Biblioitems'),
            'content' => $this->render('_formBiblioitems', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->biblioitems),
            ]),
        ],
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
