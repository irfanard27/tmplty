<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var app\models\User $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud user-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
