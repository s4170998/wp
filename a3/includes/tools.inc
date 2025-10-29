<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
function preshow($var) {
  echo '<pre>';
  if (empty($var)) echo 'No data'; else print_r($var);
  echo '</pre>';
}
?>