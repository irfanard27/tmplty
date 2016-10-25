<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Menu $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud menu-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
