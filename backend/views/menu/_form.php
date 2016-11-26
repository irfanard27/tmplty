<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;
use rmrevin\yii\fontawesome\component\Icon;

/**
* @var yii\web\View $this
* @var app\models\Menu $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="menu-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Menu',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-error',
    'options'=>['enctype'=>'multipart/form-data'],
    ]
    );
    ?>

    <div class="clearfix"></div>
    <div class="box box-primary">
        <div class="box-header with-border">
                <h3 class="box-title">Form</h3>
        </div>

        <div class="box-body">
			<?= $form->field($model, 'menu')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'icon')->textInput(['maxlength' => true,'class'=>'form-control f-icon']) ?>
            <?= $form->field($model, 'parent')->widget(Select2::className(), [
                'data' => ArrayHelper::map(\app\models\Menu::find()->all(), 'id', 'menu'),
                'options' => ['placeholder' => 'Pilih Parent Menu'],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ]) ?>

            <?= $form->field($model, 'module')->widget(Select2::className(), [
                'data' => ArrayHelper::map(\app\models\Module::find()->all(), 'id', 'module'),
                'options' => ['placeholder' => 'Pilih Module'],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ]) ?>
			<?= $form->field($model, 'controller')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="box-footer">
            <?php echo $form->errorSummary($model); ?>

            <?= Html::submitButton(
            '<span class="fa fa-check"></span> ' .
            ($model->isNewRecord ? 'Create' : 'Save'),
            [
            'id' => 'save-' . $model->formName(),
            'class' => 'btn btn-success'
            ]
            );
            ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>
<script>
    $(".f-icon").iconpicker();
</script>

