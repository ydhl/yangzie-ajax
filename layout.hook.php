<?php
require_once 'yangzie/yangzie.php';

YZE_Hook::add_hook(YZE_Hook::YZE_LAYOUT_HEADER, function($data){
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title ><?php echo YZE_Hook::do_hook(YZE_Hook::YZE_LAYOUT_TITLE, " - Yangzie AJAX")?></title>
<body>
<?php
});

YZE_Hook::add_hook(YZE_Hook::YZE_LAYOUT_FOOTER, function($data){
?>
</body>
</html>
<?php
});