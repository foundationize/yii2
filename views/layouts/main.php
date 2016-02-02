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
        <?php 
        $title = '';
        if (app\models\Utils::isHome()) {
            $title = $this->title . ' - foundationize.com';
        } else {
            $title = $this->title . ' | ' . Yii::getAlias('@site_name') . ' - foundationize.com';
        }
        ?>                
        <title><?= Html::encode($title) ?></title>
        
        <?php $this->head() ?>
    </head>
    
    <body>
        <header class="hide-for-small-down">
            <div class="row full-width">
                <div class="columns large-12 medium-12">
                                        
                   <div class="title-bar" data-responsive-toggle="example-menu" data-hide-for="medium">
                       <button class="menu-icon" type="button" data-toggle></button>
                       <div class="title-bar-title"><?= Yii::getAlias('@site_name'); ?></div>
                   </div>

                   <div class="top-bar" id="example-menu">
                       <div class="top-bar-left">
                           <ul class="dropdown menu" data-dropdown-menu>
                               <li id="site-title" class="menu-text">
                                   <a href="<?= Yii::$app->homeUrl; ?>">
                                        <?= Yii::getAlias('@site_name'); ?>
                                   </a>
                               </li>
                               
                               <li class="has-submenu">
                                   <a href="#">One</a>
                                   <ul class="submenu menu vertical" data-submenu>
                                       <li><a href="#one">One</a></li>
                                       <li><a href="#two">Two</a></li>
                                       <li><a href="#three">Three</a></li>                                       
                                   </ul>
                               </li>
                               <li><a href="#">Two</a></li>
                               <li><a href="#">Three</a></li>
                               <li><a href="/contact">Contact</a></li>
                           </ul>
                       </div>
                       <div class="top-bar-right">
                           <ul class="menu">
                               <li><input type="search" placeholder="Search"></li>
                               <li><button type="button" class="button">Search</button></li>
                           </ul>
                       </div>
                   </div>
                    
                  
                </div>
            </div>
                       
                     
        </header>
        
        
        <div id="content" class="row">
            <div class="columns large-12">

                <?= $content ?>

            </div>
        </div>
        
    
    
    <!-- here goes footer code -->
    <footer class="text-center">
        <div class="row" id="footer-nav">
            <div class="columns large-3 medium-3">
                <h4>Footer nav area 1</h4>
                <ul>
                    <li><a href="<?= Yii::$app->homeUrl; ?>">Home</a></li>
                    <li><a href="/contact">Contact us</a></li>                    
<!--                    <li><a href="/">Nav link 3</a></li>-->
                </ul>
            </div>
                
            <div class="columns large-3 medium-3">
                <h4>Footer nav area 1</h4>
                <ul>
                    <li><a href="/">Nav link 1</a></li>
                    <li><a href="/">Nav link 2</a></li>
                    <li><a href="/">Nav link 3</a></li>
                </ul>
            </div>
            
            <div class="columns large-3 medium-3">
                <h4>Footer nav area 1</h4>
                <ul>
                    <li><a href="/">Nav link 1</a></li>
                    <li><a href="/">Nav link 2</a></li>
                    <li><a href="/">Nav link 3</a></li>
                </ul>
            </div>
            
            <div class="columns large-3 medium-3">
                <h4>Footer nav area 1</h4>
                <ul>
                    <li><a href="/">Nav link 1</a></li>
                    <li><a href="/">Nav link 2</a></li>
                    <li><a href="/">Nav link 3</a></li>
                </ul>
            </div>
            
        </div>        
        
        <hr class="footer-divider">
        
        <div class="row">                       
            <div class="columns large-4 medium-4 large-centered small-centered">
                
                <div class="row" id="social">
                    <div class="columns large-3 medium-3">
                        <a class="facebook" target="_blank" href="https://facebook.com/foundationize">
                            <i class="icon-facebook"> </i> 
                        </a>
                    </div>
                    <div class="columns large-3 medium-3">
                        <a class="twitter" target="_blank" href="https://twitter.com/foundationize">
                            <i class="icon-twitter"> </i> 
                        </a>
                    </div>
                    <div class="columns large-3 medium-3">
                        <a class="google" target="_blank" href="https://plus.google.com/105150009262920559194">
                            <i class="icon-google-plus"> </i>
                        </a>
                    </div>
                    <div class="columns large-3 medium-3">
                        <a class="linkedin" target="_blank" href="http://linkedin.com">
                            <i class="icon-linkedin2"> </i>
                        </a>
                    </div>
                </div>
                
                <br>
                
                <div class="row" id="company">
                    <div class="columns large-12">
                        <span>© My Company</span>
                    </div>
                </div>
                                   
                
            </div>
        </div>                 
        
        <div class="row" id="madewith">
            <div class="columns large-12 text-right">
                <span><a title="Foundationize" href="http://foundationize.com">Foundationized with <i class="icon-heart"> </i></a></span>
            </div>
        </div>
        
    </footer>  
    
    
    <?php $this->endBody() ?>
    
    <?php
    // Google Anlaytics: 
    // Replace the below with your own Analytics / tracking JS
    if (!YII_ENV_DEV && !YII_ENV_TEST && strpos($_SERVER["SERVER_NAME"], 'yii2.foundationize.com') !== false) : ?>
    <?php    //\app\models\Utils::showPre("DBG: Live server_name=" . $_SERVER["SERVER_NAME"]); ?>
    
    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-73221432-1', 'auto');
    ga('send', 'pageview');
    </script>
    
    <?php endif; ?>
    
</body>
</html>
<?php $this->endPage() ?>
