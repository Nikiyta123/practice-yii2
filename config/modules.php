<?php
return [
    'admin' => [
        'class' => 'app\modules\admin\Module',
        'layout' => 'main',
        'defaultRoute' => 'default/index',
        'modules' => [
            'user' => [
                'class' => 'app\modules\user\Module',
                'controllerNamespace' => 'app\modules\user\controllers\backend',
                'viewPath' => '@app/modules/user/views/backend',
            ],
            'category' => [
                'class' => 'app\modules\category\Module',
                'controllerNamespace' => 'app\modules\category\controllers\backend',
                'viewPath' => '@app/modules/category/views/backend',
            ],
        ]
    ],
    'page' => [
        'class' => 'app\modules\page\Module',
        'controllerNamespace' => 'app\modules\page\controllers\frontend',
        'viewPath' => '@app/modules/page/views/frontend',
    ],
    'category' => [
        'class' => 'app\modules\category\Module',
        'controllerNamespace' => 'app\modules\category\controllers\frontend',
        'viewPath' => '@app/modules/category/views/frontend',
    ],
    'user' => [
        'class' => 'app\modules\user\Module',
        'controllerNamespace' => 'app\modules\user\controllers\frontend',
        'viewPath' => '@app/modules/user/views/frontend',
    ],
];