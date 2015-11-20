<?php
	// define('BASE_PATH','http://localhost/brainwave/');
	// define('DB_HOST', 'localhost');
	// define('DB_NAME', 'brainwave');
	// define('DB_USER','root');
	// define('DB_PASSWORD','');

	// $con = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	// // Check connection
	// if (mysqli_connect_errno())
	//   {
	//   echo "Failed to connect to MySQL: " . mysqli_connect_error();
	//   }

	$conn = mysql_connect('localhost','root','') or die (mysql_error);
	$db=mysql_select_db('brainwave', $conn) or die (mysql_error);



	class Database 
	{
	    private static $dsn = 'mysql:host=localhost;dbname=brainwave';
	    private static $username = 'root';
	    private static $password = '';
	    private static $pdo;

	    private function __construct() {}

	    public static function getDB() {
	        if (!isset(self::$pdo)) {
	            try {
	                self::$pdo = new PDO(self::$dsn, self::$username, self::$password);
	            } catch (PDOException $e) {
	                die($e->getMessage());
	            }
	        }

	        return self::$pdo;
	    }
	}

	
?>