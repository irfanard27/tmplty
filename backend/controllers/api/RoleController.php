<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "RoleController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class RoleController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Role';
}
