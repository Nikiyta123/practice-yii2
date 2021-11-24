<?php

namespace app\assets;

use yii\web\AssetBundle;

class CommonAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/common/LoadingOverlay/waitMe.min.css',
        'fontawesome/css/all.min.css',
    ];
    public $js = [
        'js/common/LoadingOverlay/waitMe.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];


}
