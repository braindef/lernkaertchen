<?php

require_once("dbcontroller.php");
$db = new DBController();

$query="INSERT INTO lernkarten (question, answer) VALUES (\"".$_GET["question"]."\", \"".$_GET["answer"]."\");";
//INSERT INTO lernkarten (question, answer) VALUES ("question", "answer");
echo $query;

$db->executeInsert($query);
$db->close();
