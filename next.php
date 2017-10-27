<?php

require_once "db_controller.php";
$db = new DBController();


//$query = "SELECT * FROM comments;";
$query = "SELECT * FROM lernkarten;";

$resultset = $db->runQuery($query);

if ($resultset == NULL)
{
  echo "Keine Daten!";
}
else
{

    $subject = $resultset[$key]['subject'];
    $theme = $resultset[$key]['theme'];
    $category = $resultset[$key]['category'];
    $question = $resultset[$key]['question'];
    $answer = $resultset[$key]['answer'];
    $image = $resultset[$key]['image'];

}
?>
