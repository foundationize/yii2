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
                        
        <?php $title = $this->title . ' | ' . Yii::getAlias('@site_name') . ' - foundationize.com'; ?>
        <title><?= Html::encode($title) ?></title>
        
        <?php $this->head() ?>
    </head>
    
    <body>

        <div class="row">
          <div class="large-12 columns">
            <h1><?= Yii::getAlias('@site_name'); ?></h1>            
          </div>
        </div>
        
        <?= $content ?>
    
    
    <!-- here goes footer code -->
                        
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
