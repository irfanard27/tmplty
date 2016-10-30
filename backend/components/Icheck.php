<?php
/**
 * Created by PhpStorm.
 * User: fan
 * Date: 30/10/2016
 * Time: 15:18
 */

namespace backend\components;
use yii\base\View;
use yii\web\AssetBundle;

class ICheck extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins/iCheck';
    public $css = [
        'all.css'
    ];
    public $js = [
        'icheck.min.js'
    ];
    public $depends = [
        'dmstr\web\AdminLteAsset',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}