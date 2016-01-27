<?php

// If index-dev exists, load it's contents
if (file_exists(dirname(__FILE__) . '/index-dev.php')) {
    include dirname(__FILE__) . '/index-dev.php'; 
    
    /*
     * In your local dev environment: 
      - Create a file 'index-dev.php'
      - Add following to file:
        defined('YII_DEBUG') or define('YII_DEBUG', true);
        defined('YII_ENV') or define('YII_ENV', 'dev');
      
      - Add file to .gitignore (or however you ignore it from source control)
        this way when deploying to live/staging, index-dev doesn't get deployed 
     */    
}

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();
