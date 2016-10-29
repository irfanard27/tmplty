<?php
/**
 * Created by PhpStorm.
 * User: Irfan
 * Date: 10/25/16
 * Time: 19:58
 */

namespace backend\components;


use app\models\Menu;
use yii\bootstrap\Widget;

class SidebarMenu extends Widget
{
    public static function getMenu(){
        $menu = [];
        foreach(Menu::find()->where(["parent"=>""])->all() as $menus){
            $mnu = [
                "label" =>$menus->menu,
                "icon"  =>$menus->icon,
                "url"   =>SidebarMenu::getUrl($menus),
            ];

            if(count($menus->menu) != 0){
                $mnu["items"] = SidebarMenu::getMenuByParent($menus->id);
            }

            $menu[]= $mnu;
        }
        return $menu;
    }

    public static function getMenuByParent($prt){
        $menu = [];
        foreach(Menu::find()->where(['parent'=>$prt])->all() as $menus){
            $mnu = [
                "label" =>$menus->menu,
                "icon"  =>$menus->icon,
                "url"   =>SidebarMenu::getUrl($menus),
            ];

            $menu[]= $mnu;
        }
        return $menu;
    }

    private static function getUrl($menu){
        if($menu->controller == NULL){
            return "#";
        }else{
            return [$menu->controller."/"];
        }
    }

}