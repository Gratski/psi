<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

if( !function_exists('hasFlash'))
{
    function hasFlash(){
        return isset($_SESSION['flash']) ? true : false;
    }
}

if( !function_exists('printFlash'))
{
    function printFlash(){
        
          
        
        echo '<div class="alert alert-'.$_SESSION['flash_type'].' alert-dismissible" role="alert">';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        echo $_SESSION['flash'];
        echo '</div>';
        
        resetFlash();
    }
}

if( ! function_exists('setFlash'))
{
    function setFlash($type, $msg){
        $_SESSION['flash'] = $msg;
        $_SESSION['flash_type'] = $type;
    }
}

if( ! function_exists('getType') )
{
    function getType(){
        return $_SESSION['flash_type'];
    }
}

if( ! function_exists('getMessage'))
{
    function getMessage(){
        return $_SESSION['flash'];
    }
}

if( ! function_exists('resetFlash'))
{
    function resetFlash(){
        unset($_SESSION['flash']);
        unset($_SESSION['flash_type']);
    }
}

