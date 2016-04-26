<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

if( ! function_exists('getAge')){
    function getAge($date){
        $age = floor((time() - strtotime($date)) / 31556926);
        return $age;
    }
}