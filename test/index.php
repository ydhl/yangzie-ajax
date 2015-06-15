<?php
require_once '../yze.config.php';
YZE_Hook::include_hooks(getcwd());
yze_go(basename(__FILE__));
?>