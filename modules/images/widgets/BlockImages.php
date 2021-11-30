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

        $model = $this->model;
        $attribute = $this->attribute;
        $model->$attribute;

    }

    public function run()
    {
        return $this->render('index',[
            'model' => $this->model,
            'images' => Images::find()->select(['path'])->asArray()->all(),
            'attribute' => $this->attribute,
            'options' => $this->options,
        ]);
    }



}