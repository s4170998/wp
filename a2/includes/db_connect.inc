<?php
$host = 'talsprddb02.int.its.rmit.edu.au';
$user = 's4170998';
$pass = 'HiruSID-369';
$db   = 's4170998';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_errno) {
    //http_response_code(500);
    exit('Database connection failed: ' . htmlspecialchars($mysqli->connect_error));
}

$mysqli->set_charset('utf8mb4');
?>
