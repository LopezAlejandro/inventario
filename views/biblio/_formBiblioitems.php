<div class="form-group" id="add-biblioitems">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Biblioitems',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'biblioitemnumber' => ['type' => TabularForm::INPUT_HIDDEN],
        'volume' => ['type' => TabularForm::INPUT_TEXTAREA],
        'number' => ['type' => TabularForm::INPUT_TEXTAREA],
        'itemtype' => ['type' => TabularForm::INPUT_TEXT],
        'isbn' => ['type' => TabularForm::INPUT_TEXTAREA],
        'issn' => ['type' => TabularForm::INPUT_TEXTAREA],
        'ean' => ['type' => TabularForm::INPUT_TEXTAREA],
        'publicationyear' => ['type' => TabularForm::INPUT_TEXTAREA],
        'publishercode' => ['type' => TabularForm::INPUT_TEXT],
        'volumedate' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Volumedate',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'volumedesc' => ['type' => TabularForm::INPUT_TEXTAREA],
        'collectiontitle' => ['type' => TabularForm::INPUT_TEXTAREA],
        'collectionissn' => ['type' => TabularForm::INPUT_TEXTAREA],
        'collectionvolume' => ['type' => TabularForm::INPUT_TEXTAREA],
        'editionstatement' => ['type' => TabularForm::INPUT_TEXTAREA],
        'editionresponsibility' => ['type' => TabularForm::INPUT_TEXTAREA],
        'timestamp' => ['type' => TabularForm::INPUT_TEXT],
        'illus' => ['type' => TabularForm::INPUT_TEXT],
        'pages' => ['type' => TabularForm::INPUT_TEXT],
        'notes' => ['type' => TabularForm::INPUT_TEXTAREA],
        'size' => ['type' => TabularForm::INPUT_TEXT],
        'place' => ['type' => TabularForm::INPUT_TEXT],
        'lccn' => ['type' => TabularForm::INPUT_TEXTAREA],
        'url' => ['type' => TabularForm::INPUT_TEXTAREA],
        'cn_source' => ['type' => TabularForm::INPUT_TEXT],
        'cn_class' => ['type' => TabularForm::INPUT_TEXT],
        'cn_item' => ['type' => TabularForm::INPUT_TEXT],
        'cn_suffix' => ['type' => TabularForm::INPUT_TEXT],
        'cn_sort' => ['type' => TabularForm::INPUT_TEXT],
        'agerestriction' => ['type' => TabularForm::INPUT_TEXT],
        'totalissues' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowBiblioitems(' . $key . '); return false;', 'id' => 'biblioitems-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Biblioitems', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowBiblioitems()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

