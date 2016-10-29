<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Role $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Roles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud role-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
