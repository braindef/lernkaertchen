<?php

require_once("dbcontroller.php");
$db = new DBController();




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $question = test_input($_POST["question"]);
  $answer = test_input($_POST["answer"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}







$query="INSERT INTO lernkarten (question, answer) VALUES ('$question', '$answer');";
//INSERT INTO lernkarten (question, answer) VALUES ("question", "answer");
//echo $query;

$db->executeInsert($query);
$db->close();
