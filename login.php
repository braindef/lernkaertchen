<?php

// start session with fingerprint
session_start();
$fingerprint = 'shizzel' . $_SERVER['HTTP_USER_AGENT'];
$_SESSION['fingerprint'] = md5($fingerprint . session_id());

// path
$host = htmlspecialchars($_SERVER["HTTP_HOST"]);
$uri = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "/\\");

// user and password
$user = 'dan';
$password = '';
// hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

// login control
if (isset($_POST["name"])
    && $_POST["name"] == $user
    && password_verify($_POST["passwort"], $hash) === true) {
    $_SESSION["name"] = $user;
    $_SESSION["login"] = "ok";
    $extra = "learningapplication.php";
} else {
    $extra = "index.php?f=1";
}
// header to..
header("Location: http://$host$uri/$extra");

?>
