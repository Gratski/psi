<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

if( ! function_exists('hasPicture')){
    function hasPicture($int){
        return $int == 1  ? true : false;
    }
}

if( ! function_exists('getPictureURL')){
    function getPictureURL($user){


        $basePath = '../../'.base_url().'/assets';
        $dir = $basePath.'/img/users/'.$user.'/';
        $file = scandir($dir)[0];
        return $dir.''.$file;
        
    }
}