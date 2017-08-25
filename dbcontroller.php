<?php

$db_handle = new DBController();

class DBController {
	//private $host = "marcland.mysql.db.internal";
	private $host = "localhost";
	private $user = "root";
	private $password = "";  //bitte das produktive Passwort nicht öffentlich auf dem Github Server speichern.
	private $database = "test";
	private $conn;

	function __construct() {
		$this->conn = $this->connectDB();
	}

	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
                if($this->conn==false)
                echo "<font color=red>Database Connection Error</font>";
                else
		{
                echo "<!--Connected to database-->";
		if ($result = mysqli_query($this->conn,"SHOW TABLES LIKE 'lernkarten'")) {
		    if($result->num_rows == 1) {
			return;
		    }
		}
		else {
			echo "Table does not exist";
			//$this->installDatabase();
		}
		}
		return $conn;
	}

	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function numRows($query) {
		$result = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;
	}

	function executeUpdate($query) {
        $result = mysqli_query($this->conn,$query);
		return $result;
    	}

	//added:
	function query($query) {
        $result = mysqli_query($this->conn,$query);
		return $result;
    	}

	//added:
	function close() {
        $result = $this->conn->close();
		return $result;
    	}

	//added:
//        function installDatabase() {
//
//		# MySQL with PDO_MYSQL
//		$db = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
//
//		$query = file_get_contents("termine.sql");
//
//		$stmt = $db->prepare($query);
//
//		if ($stmt->execute())
//		     echo "Success";
//		else
//		     echo "Fail";
//
//	}
}
?>
