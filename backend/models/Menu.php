<?php

namespace app\models;

use Yii;
use \app\models\base\Menu as BaseMenu;

/**
 * This is the model class for table "menu".
 */
class Menu extends BaseMenu
{
    public function getModule(){
        return $this->hasOne(Module::className(),["id",'id']);
    }
}
