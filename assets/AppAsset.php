<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css",
        //"https://fonts.googleapis.com",
        "https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap",
        'css/main.css',
    ];
    public $js = [
        //"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js",
        //"https://code.jquery.com/jquery-3.5.1.min.js",
        //"http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js",
        //"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js",
    ];
    public $depends = [
        'yii\bootstrap4\BootstrapAsset',
    ];
}
