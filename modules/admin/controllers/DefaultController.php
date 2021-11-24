<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;


/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAddRoles()
    {
        /*$admin = Yii::$app->authManager->createRole('admin');
        $admin->description = 'Администратор';
        Yii::$app->authManager->add($admin);

        $user = Yii::$app->authManager->createRole('user');
        $user->description = 'Пользователь';
        Yii::$app->authManager->add($user);

        $permit = Yii::$app->authManager->createPermission('AdminPanel');
        $permit->description = 'Право входа в админ-панель';
        Yii::$app->authManager->add($permit);

        $role = Yii::$app->authManager->getRole('admin');
        $permit = Yii::$app->authManager->getPermission('AdminPanel');
        Yii::$app->authManager->addChild($role, $permit);

        $userRole = Yii::$app->authManager->getRole('admin');
        Yii::$app->authManager->assign($userRole, 18);*/

        return 'Complete';
    }

}
