<?php

/**
 * 该文件为系统提供hook机制，hook主要用于下面的地方：
 * 1.数据输入,输出处理
 * 2.事件通知
 * 3.模块之间功能调用
 *
 * hook提供入处理的方式是：
 * 1.在系统启动前加载所有的hook 函数：加载每个hooks目录下的文件
 * 2.通过do_hook($hook_name, $args)调用hook，$args会传入hook函数
 * 3.对于注册到统一hook的多个函数，每一个函数返回的$args会进入下一个hook 函数
 *
 * 注册的hook函数接受一个数组参数，函数的返回值也是通过参数返回
 * 
 * @author liizii
 * @since 2009-9-1
 */

final class YZE_Hook {
    /**
     * 页面标题
     * @var unknown
     */
    const YZE_LAYOUT_TITLE   = "YZE_LAYOUT_TITLE";
    /**
     * 输出header
     * @var unknown
     */
    const YZE_LAYOUT_HEADER  = "YZE_LAYOUT_HEADER";
    /**
     * 输出footer
     * @var unknown
     */
    const YZE_LAYOUT_FOOTER  = "YZE_LAYOUT_FOOTER";
    
    /**
     * 错误模板
     * @var unknown
     */
    const YZE_LAYOUT_ERROR   = "YZE_LAYOUT_ERROR";
    
    /**
     * 输出js
     * @var unknown
     */
    const YZE_OUTPUT_JS      = "YZE_OUTPUT_JS";
    /**
     * 输出css
     * @var unknown
     */
    const YZE_OUTPUT_CSS     = "YZE_OUTPUT_CSS";
    
    private static $listeners = array ();

    public static function add_hook($event, $func_name, $object = null) {
        self::$listeners [$event] [] = array (
                "function" => $func_name,
                "object" => $object 
        );
    }
    
    public static function do_hook($filter_name, $data=array()) {
        if (! self::has_hook ( $filter_name ))
            return $data;
        foreach ( self::$listeners [$filter_name] as $listeners ) {
            if (is_object ( $listeners ['object'] )) {
                $data = call_user_func ( array($listeners ['object'], $listeners ['function']), $data);
            } else {
                $data = call_user_func ( $listeners ['function'], $data );
            }
        }
        return $data;
    }
    
    public static function has_hook($filter_name) {
        return @self::$listeners [$filter_name];
    }
    
    public static function include_hooks($dir){
        if( ! file_exists($dir) )return;
        foreach(glob($dir."/*") as $file){
            if (is_dir ( $file )) {
                self::include_hooks ( $file );
            } else {
                if(preg_match("/\.hook\.php$/", $file)) require_once $file;
            }
        }
    }
}
?>
