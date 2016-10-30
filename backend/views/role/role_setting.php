<?php


use yii\helpers\Html;
use \yii\base\Module;
use \yii\bootstrap\ActiveForm;
use \yii\helpers\Inflector;

use backend\components\ICheck;
ICheck::register($this);

/**
 * @var yii\web\View $this
 * @var app\models\Role $model
 */

$this->title = 'Hak Akses - ' . $model->role;
$this->params['breadcrumbs'][] = ['label' => 'Role', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Set Role ".$model->role];


function createCheckbox($name,$str,$value,$check){
    $ch = "<div class='checkbox icheck'><label><input type=checkbox name=$name value='$value' $check /> $str </label></div>";
    return $ch;
}

function getBaseAction($strFunction){
    return str_replace("action","",$strFunction);
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
                <th style="width: 15%">Menu</th>
                <th>Action</th>
            </tr>
            <?php foreach (\app\models\Menu::find()->all() as $no=>$menus){?>
                <tr>

                    <td>
                        <?= createCheckbox("menu[]",$menus->menu,$menus->id,""); ?>
                    </td>
                    <td>
                        <?php
                        $namespace ="backend\\controllers\\base\\".ucfirst($menus->menu)."Controller";
                        if(class_exists($namespace)) {
                            $ref = new ReflectionClass($namespace);
                            $method = $ref->getMethods();
                            foreach ($method as $func){
                                $funcName =  Inflector::camel2words($func->getName());
                                $sub =  substr($funcName,0,6);
                                if($sub=="Action" && $func->getName()!=="actions"){
                                  // echo $func->getName();
                                    echo createCheckbox($menus->menu."_action[]",getBaseAction($func->getName()),getBaseAction($func->getName()),"");
                                }
                            }
                        }

                        ?>
                    </td>
                </tr>
            <?php } ?>

        </table>



    </div>

    <div class="box-footer">

    </div>
</div>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_polaris',
            increaseArea: '5%' // optional
        });
    });
</script>
<?php ActiveForm::end()?>
