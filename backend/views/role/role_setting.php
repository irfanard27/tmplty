<?php


use app\models\Action;
use app\models\RoleMenu;
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
$this->params['breadcrumbs'][] = ['label' => "Set Role " . $model->role];


function createCheckbox($name, $str, $value, $check)
{
    $ch = "<div style='width: 150px;float: left'><div class='checkbox icheck'><label><input type=checkbox name=$name value='$value' $check /> $str </label></div></div>";
    return $ch;
}

function getBaseAction($strFunction)
{
    return str_replace("action", "", $strFunction);
}

?>

<?php $form = ActiveForm::begin(['id' => 'my-form']); ?>


<form method="post" action="#">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Setting Role
            </h3>
            <span
                class="pull-right"><?= Html::submitButton('<i class="fa fa-edit"></i> Update', ['class' => 'btn btn-primary']) ?></span>
        </div>


        <div class="box-body no-padding">
            <table class="table table-striped">
                <tr>
                    <th style="width: 15%">Menu</th>
                    <th>Action</th>
                </tr>

                <?php foreach (\app\models\Menu::find()->all() as $no => $menus) { ?>
                    <tr>

                        <td>
                            <?php
                            $arr_role[] = null;
                            $arr_action[] = null;

                            foreach (RoleMenu::find()->where(["role" => Yii::$app->user->id])->all() as $role) {
                                array_push($arr_role, $role->menu);

                                foreach (Action::find()->where(["role" => Yii::$app->user->id,'menu'=>$role->menu])->all() as $action) {
                                    $a= $role->menu."/".$action->action;
                                    $arr_action[]= strtolower($a);
                                }
                            }



                            ?>
                            <?php
                            $ch = "";
                            if (in_array($menus->id, $arr_role)) {
                                $ch = "checked";
                            }
                            echo createCheckbox("menu[]", $menus->menu, $menus->id, $ch); ?>
                        </td>
                        <td>
                            <?php
                            $namespace = "backend\\controllers\\base\\" . ucfirst($menus->menu) . "Controller";
                            if (class_exists($namespace)) {

                                $ref = new ReflectionClass($namespace);
                                $method = $ref->getMethods();

                                foreach ($method as $func) {

                                    $funcName = Inflector::camel2words($func->getName());
                                    $sub = substr($funcName, 0, 6);

                                    if ($sub == "Action" && $func->getName() !== "actions") {


                                        $val = strtolower($menus->id . "/" . getBaseAction($func->getName()));
                                        if(in_array($val,$arr_action)){
                                            $check = "checked";
                                        } else {
                                            $check = '';
                                        }

                                        echo createCheckbox("action[]", getBaseAction($func->getName()),$val, $check);
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
</form>
<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_minimal-purple',
            radioClass: 'iradio_polaris',
            increaseArea: '5%' // optional
        });
    });
</script>
<?php ActiveForm::end() ?>
