<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\Post $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud post-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
