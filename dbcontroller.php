<?php
if ($_GET["install"]==1)
{
	echo "Installing Database";
	$db_handle = new DBController();
	$db_handle->installDatabase();
}


if ($_GET["test"]==1)
{
	echo "Testing Database";
	$db_handle = new DBController();
	$db_handle->test();
}

class DBController {
	//private $host = "marcland.mysql.db.internal";
	private $host = "localhost"; 
	private $user = "marcland_telli";
	private $password = "qayxswedc$";  //bitte das produktive Passwort nicht öffentlich auf dem Github Server speichern.
	private $database = "marcland_telli";
	private $conn;
	private $db;
	
	function __construct() {
		$this->db = $this->connectDB();
	}
	
	function connectDB() {
		$db = new PDO('mysql:host='.$this->host.';dbname='.$this->database.';charset=utf8mb4',$this->user, $this->password);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		return $db;
	}

	function runQuery($query) {
		$pdoStatement = $this->db->query($query); // as $row) {
		//array_push($resultset,$row);		
		//print_r($resultset);
		//}
		//$sth = $dbh->prepare("SELECT name, colour FROM fruit");
		//$sth->execute();

		$resultset = $pdoStatement->fetchAll();
		//print_r($resultset);

		if(!empty($resultset))
		return $resultset;
	}
	
	function executeUpdate($query) {
		try {

			// Prepare statement
    			$stmt = $this->db->prepare($query);

			// execute the query
			$stmt->execute();

			// echo a message to say the UPDATE succeeded
			echo $stmt->rowCount() . " records UPDATED successfully";
		}
		catch(PDOException $e)
		{
		echo $query . "<br>" . $e->getMessage();
    		}

	}

	//added:
	function query($query) {
		try {

			// Prepare statement
    			$stmt = $this->db->prepare($query);

			// execute the query
			$stmt->execute();

			// echo a message to say the UPDATE succeeded
			echo $stmt->rowCount() . " records UPDATED successfully";
		}
		catch(PDOException $e)
		{
		echo $query . "<br>" . $e->getMessage();
    		}
    	}

	//added:
	function close() {
        $result = $this->conn->close();        
		return $result;		
    	}

	//added:
	function test() {
		try {
			//connect as appropriate as above
			$this->db->query('hi'); //invalid query!
		} catch(PDOException $ex) {
			echo "An Error occured!"; //user friendly message
			//some_logging_function($ex->getMessage());
		}
		$resultset=array();
		foreach($this->db->query('SELECT * FROM test') as $row) {
			array_push($resultset,$row);		
			print_r($resultset);
		}	
	}


	//added:
        function installDatabase() {

		# MySQL with PDO_MYSQL  
		$db = new PDO("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);

		$query = file_get_contents("termine.sql");

		$stmt = $db->prepare($query);

		if ($stmt->execute())
		     echo "Success";
		else 
		     echo "Fail";

	}
}
?>
