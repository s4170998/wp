$host = 'localhost';
$user = 's4170998';           
$pass = 'Hirudi-269';
$db   = 's4170998';

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
  http_response_code(500);
  exit('Database connection failed: ' . htmlspecialchars($mysqli->connect_error));
}
$mysqli->set_charset('utf8mb4');