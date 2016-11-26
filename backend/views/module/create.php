<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Module $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Modules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud module-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
