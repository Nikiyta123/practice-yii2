<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\admin\asset;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/admin/main.css',

    ];
    public $js = [
        'https://code.jquery.com/ui/1.13.0/jquery-ui.js',//sortable
        'js/admin/ng-flow/ng-flow-standalone.min.js',
    ];
    public $depends = [

    ];
}
