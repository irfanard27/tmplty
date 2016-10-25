<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="login-box">
    <div class="login-logo">
        <b align="center"><?= Html::encode($this->title) ?></b> Admin
    </div>
<div class="login-box-body">

    <p class="login-box-msg with-border">Please fill out the following fields to login</p>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="pull-left">
                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                </div>

                <div class="pull-right">
                    <div class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                    </div>
                </div>


            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div>
