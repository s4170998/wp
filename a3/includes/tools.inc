<?php
if (session_status() === PHP_SESSION_NONE) session_start();

function preshow($v){ echo '<pre>'; echo empty($v)?'No data':print_r($v,true); echo '</pre>'; }

function ok($m){ $_SESSION['message']=$m; }
function err($m){ $_SESSION['error']=$m; }
function redirect($u){ header("Location: $u"); exit; }

function current_user_id(){ return $_SESSION['user_id'] ?? null; }
function current_username(){ return $_SESSION['username'] ?? ''; }

function require_login(){
  if (!current_user_id()){ err('Login required'); redirect('login.php'); }
}

function is_owner($owner_id){
  $uid = current_user_id();
  return $uid && (int)$uid === (int)$owner_id;
}

function is_post(){ return (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST'); }

function get_param($k,$d=''){ return isset($_GET[$k]) ? trim($_GET[$k]) : $d; }
function post_param($k,$d=''){ return isset($_POST[$k]) ? trim($_POST[$k]) : $d; }

function allowed_image($name){
  return (bool)preg_match('/\.(jpg|jpeg|png|gif|webp)$/i',$name);
}

function sanitize_filename($name){
  $name = preg_replace('/[^A-Za-z0-9._-]/','_',$name);
  return preg_replace('/_+/','_',$name);
}

function unique_name($original){
  $ext = strtolower(pathinfo($original, PATHINFO_EXTENSION));
  $base = bin2hex(random_bytes(8));
  return $ext ? "$base.$ext" : $base;
}
