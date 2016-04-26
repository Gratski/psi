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
        $dir = 'imgs/'.$user.'/';
        if($dh = opendir($dir)){
            $file = readdir($dh);
            return $dir.''.$file;
        }else{
            return '';
        }
    }
}