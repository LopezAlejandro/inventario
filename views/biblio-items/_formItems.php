<div class="form-group" id="add-items">
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
    'formName' => 'Items',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'itemnumber' => ['type' => TabularForm::INPUT_HIDDEN],
        'biblionumber' => [
            'label' => 'Biblio',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Biblio::find()->orderBy('title')->asArray()->all(), 'biblionumber', 'title'),
                'options' => ['placeholder' => 'Choose Biblio'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'barcode' => ['type' => TabularForm::INPUT_TEXT],
        'dateaccessioned' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Dateaccessioned',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'booksellerid' => ['type' => TabularForm::INPUT_TEXTAREA],
        'homebranch' => ['type' => TabularForm::INPUT_TEXT],
        'price' => ['type' => TabularForm::INPUT_TEXT],
        'replacementprice' => ['type' => TabularForm::INPUT_TEXT],
        'replacementpricedate' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Replacementpricedate',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'datelastborrowed' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Datelastborrowed',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'datelastseen' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Datelastseen',
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'stack' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'notforloan' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'damaged' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'damaged_on' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Damaged On',
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'itemlost' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'itemlost_on' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Itemlost On',
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'withdrawn' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'withdrawn_on' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Withdrawn On',
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'itemcallnumber' => ['type' => TabularForm::INPUT_TEXT],
        'coded_location_qualifier' => ['type' => TabularForm::INPUT_TEXT],
        'issues' => ['type' => TabularForm::INPUT_TEXT],
        'renewals' => ['type' => TabularForm::INPUT_TEXT],
        'reserves' => ['type' => TabularForm::INPUT_TEXT],
        'restricted' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'itemnotes' => ['type' => TabularForm::INPUT_TEXTAREA],
        'itemnotes_nonpublic' => ['type' => TabularForm::INPUT_TEXTAREA],
        'holdingbranch' => ['type' => TabularForm::INPUT_TEXT],
        'timestamp' => ['type' => TabularForm::INPUT_TEXT],
        'deleted_on' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Deleted On',
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'location' => ['type' => TabularForm::INPUT_TEXT],
        'permanent_location' => ['type' => TabularForm::INPUT_TEXT],
        'onloan' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATE,
                'saveFormat' => 'php:Y-m-d',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Onloan',
                        'autoclose' => true
                    ]
                ],
            ]
        ],
        'cn_source' => ['type' => TabularForm::INPUT_TEXT],
        'cn_sort' => ['type' => TabularForm::INPUT_TEXT],
        'ccode' => ['type' => TabularForm::INPUT_TEXT],
        'materials' => ['type' => TabularForm::INPUT_TEXTAREA],
        'uri' => ['type' => TabularForm::INPUT_TEXTAREA],
        'itype' => ['type' => TabularForm::INPUT_TEXT],
        'more_subfields_xml' => ['type' => TabularForm::INPUT_TEXTAREA],
        'enumchron' => ['type' => TabularForm::INPUT_TEXTAREA],
        'copynumber' => ['type' => TabularForm::INPUT_TEXT],
        'stocknumber' => ['type' => TabularForm::INPUT_TEXT],
        'new_status' => ['type' => TabularForm::INPUT_TEXT],
        'exclude_from_local_holds_priority' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowItems(' . $key . '); return false;', 'id' => 'items-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Items', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowItems()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

