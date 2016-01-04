<?php
/**
 * Utility functions
 */
namespace app\models;


class Utils {
    
    public static function arr_to_string($arr) {
        if (true) { //is_object($arr)
            ob_start();
            var_dump($arr);
            $str = ob_get_contents();
            ob_end_clean();
            return $str;
        } else { //prolly a string
            return $arr;
        }
        return '';
    }
    
    public static function getCurrentURL() 
    {        
        return \Yii::$app->urlManager->createAbsoluteUrl(\Yii::$app->request->url);
    }
    
    public static function isHome()
    {
        $home1 = \yii\helpers\Url::home(true);
        $home2 = self::getCurrentURL();
                                
        return (($home1 == $home2) || ( strpos($home2, 'site/index') !== false));
    }
    
}
