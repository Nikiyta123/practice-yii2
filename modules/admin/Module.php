<?php

namespace app\modules\admin;

use yii\filters\AccessControl;
/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                /*'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['AdminPanel'],
                    ],
                ]*/
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function($rule,$action){
                            return \Yii::$app->user->identity->isAdmin;
                        },
                    ],
                ],

            ],
        ];
    }

}
