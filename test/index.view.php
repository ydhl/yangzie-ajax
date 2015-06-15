<?php
require_once '../yze.config.php';

YZE_Hook::add_hook(YZE_Hook::YZE_LAYOUT_TITLE, function ($title){
    return "测试表单提交".$title;
});

YZE_Hook::do_hook(YZE_Hook::YZE_LAYOUT_HEADER);
?>

<h1>正常表单测试</h1>

<form method="post">
    <input type="text" name="name" value=""/>
    <input type="submit" value="submit"/>
</form>

<h1>表单AJAX测试</h1>

<div>
    <input type="text" name="name"/>
    <input type="submit" value="submit"/>
</div>
<?php 
YZE_Hook::do_hook(YZE_Hook::YZE_LAYOUT_FOOTER);?>