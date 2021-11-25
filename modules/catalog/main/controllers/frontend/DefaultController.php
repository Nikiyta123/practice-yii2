<?php

namespace app\modules\catalog\main\controllers\frontend;

use Yii;
use yii\web\Controller;


class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }


}
