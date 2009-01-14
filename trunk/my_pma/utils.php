<?php
error_reporting(E_ALL);
set_include_path('./lib;'.
				 './lib/Controller;' .
				 './lib/View;' .
				 './lib/View/Helper;' .
				 './lib/Model;' .
				 './lib/Exception;' .
				 './application;' .
				 './application/controllers;' .
				 './application/models;' .
				 './application/views;'
				 );
				 
function __autoload($ClassName)
{
    include_once($ClassName.'.php');
}

define("DEBUG",1);
function debug($msg)
{
    $out = "";
    switch (DEBUG) {
    	case 0: break;
    	case 1: 
    	    $out = (is_array($msg) || is_object($msg)) ? print_r($msg) . "\n" : $msg . "\n" ;
    	    break;
    	case 2:
    	    $out = (is_array($msg) || is_object($msg)) ? print_r($msg) . '<br />' : $msg . '<br />';
    	    break;
    	default: break;
    }
    if (!empty($out))
        echo $out;
}