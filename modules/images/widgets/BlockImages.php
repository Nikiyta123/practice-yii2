<?php
namespace app\modules\images\widgets;

use yii\base\Widget;
use app\modules\images\models\Images;

class BlockImages extends Widget
{

    public $model;
    public $attribute;
    public $options;

    public function init()
    {
        parent::init();



    }

    public function run()
    {
        return $this->render('index',[
            'model' => $this->model,
        ]);
    }



}