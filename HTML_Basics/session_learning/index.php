<?php // opens php code section
session_start();

require_once "assets/common.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

$_SESSION["message"] = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

}
echo"<!DOCTYPE html>";
echo"<html>";
echo "<head>";

echo"<title>Session Work</title>";
echo"<link rel='stylesheet' href='css/styles.css'>";

echo"</head>";

echo"<body>";
echo"<div class = 'container'>";
    require_once "assets/top_bar.php";
    require_once "assets/nav.php";

    echo"<div class = 'content'>";

    echo"<h2>Session Work</h2>";

    echo"<form method='post' action=''>"; // take user input to store in session and output else where
    echo"<label for='username'>Message: </label>";
    echo"<input type = 'text' name = 'message' placeholder = 'Message'>";
    echo"<br>";
    echo"<br>";
    echo"<input type = 'submit' name = 'submit' value = 'Submit'>";
    echo"</form>";
    echo usr_msg();

    echo"</div>";
    echo"</div>";

echo"</body>";
echo"</html>";
?>