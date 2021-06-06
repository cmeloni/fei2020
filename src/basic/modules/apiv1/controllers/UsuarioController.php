<?php

namespace app\modules\apiv1\controllers;

use yii\rest\ActiveController;

/**
 * Default controller for the `apiv1` module
 */
class UsuarioController extends ActiveController
{
    public $modelClass = 'app\modules\apiv1\models\Usuario';

    public function actions() 
    { 
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }

    public function prepareDataProvider() 
    {
        $searchModel = new \app\modules\apiv1\models\UsuarioQuery();    
        return $searchModel->search(\Yii::$app->request->queryParams);
    }

}
