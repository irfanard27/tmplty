<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var app\models\RoleSearch $searchModel
 */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
    $actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
    Yii::$app->view->params['pageButtons'] = Html::a('<span
    class="fa fa-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update} {delete}";
}

?>
<div class="giiant-crud role-index">

    <?php //             echo $this->render('_search', ['model' =>$searchModel]);
    ?>


    <?php \yii\widgets\Pjax::begin(['id' => 'pjax-main', 'enableReplaceState' => false, 'linkSelector' => '#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success' => 'function(){alert("yo")}']]) ?>

    <div class="pull-left">
        <?= Html::a('<span class="fa fa-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <div class="pull-right">


        <?=
        \yii\bootstrap\ButtonDropdown::widget(
            [
                'id' => 'giiant-relations',
                'encodeLabel' => false,
                'label' => '<span class="fa fa-paperclip"></span> ' . 'Relations',
                'dropdown' => [
                    'options' => [
                        'class' => 'dropdown-menu-right'
                    ],
                    'encodeLabels' => false,
                    'items' => []
                ],
                'options' => [
                    'class' => 'btn-default'
                ]
            ]
        );
        ?>    </div>
</div><br clear="all"><br>

<div class="clearfix"></div>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Data <?= Yii::t('app', 'Roles') ?></h3>
    </div>

    <div class="box-body">
        <div class="table-responsive ">
            <?= GridView::widget([
                'layout' => '{summary}{pager}{items}{pager}',
                'dataProvider' => $dataProvider,
                'pager' => [
                    'class' => yii\widgets\LinkPager::className(),
                    'firstPageLabel' => 'First',
                    'lastPageLabel' => 'Last'],
                'filterModel' => $searchModel,
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover'],
                'headerRowOptions' => ['class' => 'x'],
                'columns' => [

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => $actionColumnTemplateString,
                        'urlCreator' => function ($action, $model, $key, $index) {
                            // using the column name as key, not mapping to 'id' like the standard generator
                            $params = is_array($key) ? $key : [$model->primaryKey()[0] => (string)$key];
                            $params[0] = \Yii::$app->controller->id ? \Yii::$app->controller->id . '/' . $action : $action;
                            return Url::toRoute($params);
                        },
                        'contentOptions' => ['nowrap' => 'nowrap']
                    ],
                    'role',
                    [
                        'label' => 'Setting Role',
                        'format' => 'raw',
                        'value' => function ($role) {
                            return Html::a("<i class='fa fa-gear'></i> Setting", ['setting?id=' . $role->id], ["class" => 'btn btn-warning']);
                        }
                    ],
                ],
            ]); ?>
        </div>
    </div>
</div>


<?php \yii\widgets\Pjax::end() ?>


