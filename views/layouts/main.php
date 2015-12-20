<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use yii\bootstrap\Nav;
//use yii\bootstrap\NavBar;
//use yii\widgets\Breadcrumbs;

use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js" lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    
    <body>

        <div class="row">
          <div class="large-12 columns">
            <h1>Foundationize - Welcome to Foundation for Sites 6</h1>
            
            <hr>
            This is header div
          </div>
        </div>
        
        <?= $content ?>
    
    
    
        <div class="row">
            <div class="columns large-3">
                
            </div>
            
            <div class="columns large-3">
                
            </div>
            
            <div class="columns large-3">
                
            </div>
            
            <div class="columns large-3">
                &copy; Foundationize built with <3 by twoggle <?= date('Y') ?>
            </div>
        </div>
                        
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
