<?php
class DBController {
	//private $host = "danielan.mysql.db.internal";
	private $host = "localhost";
	private $user = "root";
	private $password = "";  //bitte das produktive Passwort nicht öffentlich auf dem Github Server speichern.
	private $database = "test";
	private $conn;



// Create connection
function __construct() {
    $this->conn = $this->connectDB();
    if (!$this->conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
}

function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
}


?>

