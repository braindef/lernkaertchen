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


// image upload
// TODO: Neues Codesnippet nehmen
/*if (isset($_FILES["image"]) AND ! $_FILES["image"]["error"] AND ($_FILES["image"]["size"] < 600000)) {
    $bildinfo = getimagesize($_FILES["image"]["tmp_name"]);
    if ($bildinfo === false) {
        die("kein Bild!");
    } else {
        $mime = $bildinfo["mime"];
        $mimetypen = array (
            "image/jpeg" => "jpg",
            "image/gif" => "gif",
            "image/png" => "png"
        );
    if (!isset($mimetypen[$mime])) {
        die("nicht das richtige Format!");
    } else {
        $endung = $mimetypen[$mime];
    }
    $neuername = basename($_FILES["image"]["name"]);
    $neuername = preg_replace("/\.(jpe?g|gif|png)$/i", "", $neuername);
    $neuername = preg_replace("/[^a-zA-Z0-9_-]/", "", $neuername);
    $neuername .= ".$endung";
    $image = "upload/$neuername";
    while (file_exists($image)) {
        $neuername = "kopie_$neuername";
        $image = "upload/$neuername";
    }
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $image)) {
        echo "Dateiupload hat geklappt!";
    } else {
        echo "Dateiupload hat nicht geklappt!";
    }
    }
}   */


// image upload new
/*
if (isset($_POST['image'])) {

    $name = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES['file']['name']);

    // select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // valid file extensions
    $extensions_arr = array("jpg","jpeg","png","gif");

    // check extensions
    if (in_array($imageFileType, $extensions_arr)) {

        // convert to base64
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        $image = 'data:image/' . $imageFileType . ';base64,'.$image_base64;

        // insert record
        // see below..

        //upload file
        move_uploaded_file($_FILES['file']['tmp_name'], $target_dir.$name);

    }

}   */



// copy pasted the code
if(isset($_POST['upload'])){

 $name = $_FILES['file']['name'];
 $target_dir = "upload/";
 $target_file = $target_dir . basename($_FILES["file"]["name"]);

 // Select file type
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

 // Valid file extensions
 $extensions_arr = array("jpg","jpeg","png","gif");

 // Check extension
 if( in_array($imageFileType,$extensions_arr) ){

  // Convert to base64
  $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
  $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
  // Insert record


  // Upload file
  move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
 }

}




$query="INSERT INTO lernkarten (subject, theme, category, question, answer, image) VALUES ('$subject', '$theme', '$category', '$question', '$answer', '$image');";
//INSERT INTO lernkarten (question, answer) VALUES ("question", "answer");
//echo $query;

$db->executeInsert($query);
$db->close();
