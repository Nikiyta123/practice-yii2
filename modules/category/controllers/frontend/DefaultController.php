<?php

namespace app\modules\category\controllers\frontend;

use Yii;
use yii\web\Controller;


class DefaultController extends Controller
{

    public function actionTest()
    {
        return $this->render('exemple');
    }


}
