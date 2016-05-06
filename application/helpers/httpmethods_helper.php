<?php 
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

if( ! function_exists('getFromInputStream')){
	function getFromInputStream(){
		parse_str(file_get_contents('php://input'), $input);
		return $input;
	}
}


?>