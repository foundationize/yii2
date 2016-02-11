<?php
/**
 * JsSocialAsset
 * @link http://js-socials.com/start-using/ JS Social Sharing 
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author gvanto
 */
class JsSocialAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'https://cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css',
        'https://cdn.jsdelivr.net/jquery.jssocials/1.1.0/jssocials.css',
        'https://cdn.jsdelivr.net/jquery.jssocials/1.1.0/jssocials-theme-flat.css'       
    ];
    
    public $js = [
        'https://cdn.jsdelivr.net/jquery.jssocials/1.1.0/jssocials.min.js'
    ];
    
    // Depends on jQuery
    public $depends = [
        'yii\web\JqueryAsset'
    ];    
}
