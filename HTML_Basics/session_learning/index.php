<?php // opens php code section
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {



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
    echo"<label for='username'>Username: </label>";
    echo"<input type = 'text' name = 'username' placeholder = 'Username'>";
    echo"<br>";
    echo"<label for='password'>Password: </label>";
    echo"<input type = 'password' name = 'password' placeholder = 'Password'>";
    echo"<br>";
    echo"<input type = 'submit' name = 'submit' value = 'Submit'>";
    echo"</form>";

    echo"</div>";
    echo"</div>";

echo"</body>";
echo"</html>";
?>