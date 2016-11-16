<?php
// ---- load config file ----
require'inc/config.php';

$studentId = isset($_POST['studentId']) ? intval(trim($_POST['studentId'])) : 0;