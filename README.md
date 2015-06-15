# yangzie ajax 框架

## 特点

* 基于hook机制
* 模块化（php代码，js代码，css代码）
* MVC
    * 灵活的视图、模版、视图重用
    * yze-action
* modules 为模块目录，每个目录是个独立的模块，不使用其他模块的代码
* 统一的错误处理，异常处理
* 所有hook以hook.php后缀结尾
* 数据回显

## 用法

1. 在自己的项目中包含yangzie框架目录
2. 以模块组织代码
2. 在自己的页面中包含根目录的yze.config.php，它主要包含yangzie框架的文件
3. 注册模块自己的hook，yangzie会去这里加载hook
    YZE_Hook::include_hooks(/*hook目录*/);
4. 开发php功能页面：
    php文件如果涉及到数据的提交（post，ajax），那yangzie建议把这部分的代码分离出来，单独写成一个文件；
    杂在一个文件中不好维护。比如文件order.php,按照功能分成,以orders.php为例，该界面显示订单列表
    1. 入口orders.php: 控制入口，显示数据还是处理数据提交, 只需一句调用
        yze_go(basename(__FILE__));
    2. 也可以用yangzie/controller.php作为入口，只需传入参数：
        yzectl=目标文件路径&其他的参数
    2. 视图orders.view.php: 处理界面显示
    3. API order.api.php：处理数据提交，ajax等
    
    当然也可以所有都写在orders.php中
    
    视图的处理
    
    1. 注册布局header和footer hook，负责输出页面的头和尾