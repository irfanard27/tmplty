<?php


use yii\helpers\Html;
use \yii\base\Module;
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Inflector;

/**
 * @var yii\web\View $this
 * @var app\models\Role $model
 */

$this->title = 'Hak Akses - ' . $model->role;
$this->params['breadcrumbs'][] = ['label' => 'Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Set Role ".$model->role];


function createCheckbox($name,$str,$value,$check){
    $ch = "<input type=\"checkbox\" name=$name value='$value' $check /> $str";
    return $ch;
}

?>

<?php $form = ActiveForm::begin(['id' => 'my-form']); ?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Setting Role</h3>
    </div>

    <div class="box-body no-padding">
        <table class="table table-striped">
            <tr>
                <th style="width: 10px">#</th>
                <th style="width: 15%">Menu</th>
                <th>Action</th>
            </tr>
            <?php foreach (\app\models\Menu::find()->all() as $no=>$menus){?>
                <tr>
                    <td><?=$no+1?></td>
                    <td>
                        <?= createCheckbox("menu[]",$menus->menu,$menus->id,""); ?>
                    </td>
                    <td>
                        actions
                    </td>
                </tr>
            <?php } ?>

        </table>



    </div>

    <div class="box-footer">

    </div>
</div>

<?php ActiveForm::end()?>
