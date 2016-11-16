<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var backend\models\Galeri $model
*/

$this->title = 'Create';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Galeris'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud galeri-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
