<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

if( ! function_exists('hasPicture')){
    function hasPicture($int){
        return $int == 1  ? true : false;
    }
}

if( ! function_exists('getSmallPicture')){
    function getSmallPicture($user, $fotoFlag){
        // se tem picture
        if($fotoFlag == 0 || $fotoFlag == "0")
        {
            return '<i class="glyphicon glyphicon-user"></i>';
        }
        // se tem picture
        else{
            $basePath = '../..'.base_url().'assets';
            $dir = $basePath.'/img/users/'.$user.'/';
            $file = scandir($dir, 1);
            if(count($file) > 0)
            {
                //echo "HAS FILE ---- ";
                //echo "FILE " . var_dump($file);
                return '<img src="../../../'.$dir.''.$file[0].'" width="30" height="30" class="img-circle"/>';
            }else{
                return '<i class="glyphicon glyphicon-user"></i>';
            }
        }
    }
}

if( ! function_exists('getMediumPicture')){
    function getMediumPicture($user, $fotoFlag){
        // se tem picture
        if($fotoFlag == 0 || $fotoFlag == "0")
        {
            return '<i class="glyphicon glyphicon-user" style="font-size:85px;"></i>';
        }
        // se tem picture
        else{
            $basePath = '../..'.base_url().'assets';
            $dir = $basePath.'/img/users/'.$user.'/';
            $file = scandir($dir, 1);
            if(count($file) > 0)
            {
                return '<img src="../../../'.$dir.''.$file[0].'" width="150" height="150"/>';
            }else{
                return '<i class="glyphicon glyphicon-user"></i>';
            }
        }
    }
}