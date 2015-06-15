<?php
global $yze_begin;
$yze_begin = microtime();

$yze_cwd = dirname(__FILE__);
include_once $yze_cwd.'/hooks.php';
include_once $yze_cwd.'/utils.php';
// include_once $yze_cwd.'/view.php';
include_once $yze_cwd.'/sql.php';
include_once $yze_cwd.'/db.php';
include_once $yze_cwd.'/pdo.php';

function yze_go($file){
    $api  = preg_replace("/\.php$/", ".api.php",    $file);
    $view = preg_replace("/\.php$/", ".view.php",   $file);
    if($_POST){
        if(file_exists($api)){
            include $api;
        }else{
            die("file $api not found");
        }
        die;
    }
    
    if(file_exists($view)){
        include $view;
    }else{
        die("file $view not found");
    }
}
?>