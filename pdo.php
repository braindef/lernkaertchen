<?php
//$db = new PDO('mysql:host=localhost;dbname=lernkarten;charset=utf8mb4', 'root', '');
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

require_once("dbcontroller.php");
$db = new DBController();

//try {
	//connect as appropriate as above
	//$db->query('hi'); //invalid query!
//} catch(PDOException $ex) {
//	echo "An Error occured!"; //user friendly message
//	//some_logging_function($ex->getMessage());
//}

foreach($db->runQuery('SELECT * FROM test') as $row) {
	    echo "Morgen: ". $row['morgen'].' abends: '.$row['abends']."<br>";
}

