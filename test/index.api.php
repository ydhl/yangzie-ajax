<?php
require_once '../yze.config.php';

yze_success($db->lookup("name", "users", "id=1"));

header("Location: orders.php");
?>