<?php

require_once("dbcontroller.php");
$db = new DBController();




if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $subject = test_input($_POST["subject"]);
  $theme = test_input($_POST["theme"]);
  $category = test_input($_POST["category"]);
  $answer = test_input($_POST["answer"]);
  $question = test_input($_POST["question"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}







$query="INSERT INTO lernkarten (subject, theme, category, question, answer) VALUES ('$subject', '$theme', '$category', '$question', '$answer');";
//INSERT INTO lernkarten (question, answer) VALUES ("question", "answer");
//echo $query;

$db->executeInsert($query);
$db->close();
