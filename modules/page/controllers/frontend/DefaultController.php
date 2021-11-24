<?php

namespace app\modules\page\controllers\frontend;

use Yii;
use yii\web\Controller;


class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }


}
