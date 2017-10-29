<?php

require_once "db_controller.php";
$db = new DBController();


//$query = "SELECT * FROM comments;";
$query = "SELECT * FROM lernkarten WHERE id = 18;";

$resultset = $db->runQuery($query);

if ($resultset == NULL)
{
  echo "Keine Daten!";
}
else
{

    $subject = $resultset['subject'];
    $theme = $resultset['theme'];
    $category = $resultset['category'];
    $question = $resultset['question'];
    $answer = $resultset['answer'];
    $image = $resultset['image'];

}
?>
