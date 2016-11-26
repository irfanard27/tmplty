<?php
/**
 * Created by PhpStorm.
 * User: Irfan
 * Date: 10/25/16
 * Time: 19:58
 */

namespace backend\components;


use app\models\Menu;
use app\models\RoleMenu;
use yii\bootstrap\Widget;

class SidebarMenu extends Widget
{
    public static function getMenu($module=2){
        $menu = [];

        $role_menu = Menu::find()
            ->leftJoin('role_menu','menu.id = role_menu.menu')
            ->where([
                "menu.parent"=>"",
                'role_menu.role'=>\Yii::$app->user->id,
                'module'=>$module
            ])
            ->all();

        foreach($role_menu as $menus){
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

    public static function getMenuByParent($prt,$module=2){
        $menu = [];
        $role_menus = Menu::find()
            ->leftJoin('role_menu','menu.id = role_menu.menu')
            ->where([
                "menu.parent"=>$prt,
                'role_menu.role'=>\Yii::$app->user->id,
                'module'=>$module
            ])
            ->all();

        foreach($role_menus as $menus){
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
