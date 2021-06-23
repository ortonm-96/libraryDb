
<?php 
if (!defined('DB_SERVER')) {
	define('DB_SERVER', 'localhost');
}
if (!defined('DB_USERNAME')) {
	define('DB_USERNAME', 'root');
}

if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', '');
}

if (!defined('DB_NAME')) {
	define('DB_NAME', 'librarydb');
}

// Todo: Put this into a try/catch
$pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);

?>