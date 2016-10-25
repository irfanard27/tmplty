<?php

namespace backend\controllers\api;

/**
* This is the class for REST controller "PostController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class PostController extends \yii\rest\ActiveController
{
public $modelClass = 'app\models\Post';
}
