<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "ModuleController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ModuleController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Module';
}
