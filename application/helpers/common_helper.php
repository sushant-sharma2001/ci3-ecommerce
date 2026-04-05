<?php
defined('BASEPATH') or exit();

if(!function_exists('dd')){
    function dd($data){
        echo "<pre>";
        print_r($data);
        die;
    }
}
?>