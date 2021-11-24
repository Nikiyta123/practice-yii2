<?php
namespace app\modules\user\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use app\modules\user\models\SignInForm;
use app\modules\user\models\SignUpForm;

class BlockForms extends Widget
{

    public $filename;
    public $model;


    public function init()
    {
        parent::init();

        if ($this->filename == 'SignInForm') $this->model = new SignInForm();
        elseif ($this->filename == 'SignUpForm') $this->model = new SignUpForm();

    }

    public function run()
    {
        return $this->render('block-'.$this->filename,[
            'model' => $this->model,
            'name' => $this->filename,
        ]);
    }



}