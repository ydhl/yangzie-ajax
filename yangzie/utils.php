<?php 
/**
 * yangzie函数库
 */

function yze_error($message="", $code=null){
    global $yze_begin;
    echo json_encode(array('success'=> false, "errorCode"=>$code, "data"=>null,"msg"=>$message, "time"=>microtime()-$yze_begin));
    die;
}

function yze_success($data=null){
    global $yze_begin;
    echo json_encode(array('success'=> true, "data"=>$data,"msg"=>null,"time"=>microtime()-$yze_begin));
    die;
}

function yze_now(){
	return date("Y-m-d H:i:s");
}

function yze_today(){
	return date("Y-m-d");
}

/**
 * 
 * 创建目录
 * @param  $dirs 绝对地址
 *          
 */
function yze_make_dirs($path) {
    $dirs = explode ( DS, strtr(rtrim( $path, DS), array ("/" => DS)) );
    foreach ($dirs  as $d ) {
        $dir = @$dir . $d . DS;
        @mkdir ( $dir, 0777 );
    }
}