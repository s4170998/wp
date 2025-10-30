<?php
if (session_status() === PHP_SESSION_NONE) session_start();

function preshow($var) {
  echo '<pre>';
  if (empty($var)) echo 'No data'; else print_r($var);
  echo '</pre>';
}

function ok($msg) {
  $_SESSION['message'] = $msg;
}

function err($msg) {
  $_SESSION['error'] = $msg;
}
?>
