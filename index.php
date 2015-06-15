<?php
require_once 'yangzie/yangzie.php';

YZE_Hook::include_hooks(getcwd());

YZE_Hook::do_hook(YZE_Hook::YZE_LAYOUT_HEADER);

echo "<pre>";
echo file_get_contents('README.md');
echo "</pre>";

YZE_Hook::do_hook(YZE_Hook::YZE_LAYOUT_FOOTER);?>