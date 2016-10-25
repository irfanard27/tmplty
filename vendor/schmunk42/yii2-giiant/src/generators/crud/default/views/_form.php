<?php

use yii\helpers\StringHelper;

/*
 * @var yii\web\View $this
 * @var yii\gii\generators\crud\Generator $generator
 */

/** @var \yii\db\ActiveRecord $model */
$model = new $generator->modelClass();
$model->setScenario('crud');
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->getTableSchema()->columnNames;
}

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var <?= ltrim($generator->modelClass, '\\') ?> $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="<?= \yii\helpers\Inflector::camel2id(
    StringHelper::basename($generator->modelClass),
    '-',
    true
) ?>-form">

    <?= '<?php ' ?>$form = ActiveForm::begin([
    'id' => '<?= $model->formName() ?>',
    'layout' => '<?= $generator->formLayout ?>',
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
            <?php
            foreach ($safeAttributes as $attribute) {
                $prepend = $generator->prependActiveField($attribute, $model);
                $field = $generator->activeField($attribute, $model);
                $append = $generator->appendActiveField($attribute, $model);

                if ($prepend) {
                    echo "\n\t\t\t".$prepend;
                }
                if ($field) {
                    echo "\n\t\t\t<?= ".$field.' ?>';
                }
                if ($append) {
                    echo "\n\t\t\t".$append;
                }
            }
            ?>

        </div>

        <div class="box-footer">
            <?= '<?php ' ?>echo $form->errorSummary($model); ?>

            <?= '<?= ' ?>Html::submitButton(
            '<span class="fa fa-check"></span> ' .
            ($model->isNewRecord ? <?= $generator->generateString('Create') ?> : <?= $generator->generateString('Save') ?>),
            [
            'id' => 'save-' . $model->formName(),
            'class' => 'btn btn-success'
            ]
            );
            ?>
        </div>

    </div>
    <?= '<?php ' ?>ActiveForm::end(); ?>

</div>

