<?php // opens php code section
session_start(); // opens our connection to the session
require_once "assets/common.php";

echo"<!DOCTYPE html>";
echo"<html>";
echo "<head>";

echo"<title>Title</title>";
echo"<link rel='stylesheet' href='css/styles.css'>";

echo"</head>";

echo"<body>";
echo"<div class = 'container'>";
    require_once "assets/top_bar.php";
    require_once "assets/nav.php";

    echo"<div class = 'content'>";

        echo"<form method='post' action=''>"; // sends data to post
        echo"<label id='url' for='url'>URL: </label>"; // gets data from user
        echo"<input type='text' name='url' id = 'url' placeholder='URL'>";
        echo"<br>";
        echo"<label id='num' for='num'>Number: </label>"; // gets data from user
        echo"<input type='text' name='integer' id = 'num' placeholder='Number of Tickets'>";
        echo"<br>";
        echo"<label id='Float' for='Float'>Float: </label>"; // gets data from user
        echo"<input type='text' name='float' id = 'Float' placeholder='Float'>";
        echo"<br>";
        echo"<label id='num' for='num'>Text: </label>"; // gets data from user
        echo"<input type='text' name='text' id = 'text' placeholder='Text'>";
        echo"<br>";
        echo"<label id='email' for='email'> Email: </label>";
        echo"<input type='text' name='email' id = 'email' placeholder='Email'>";
echo"<br>";
        echo"<input type='submit' name='submit' value='Submit'>"; // submit button to submit data to post
        echo"</form>";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    echo filter_var($_POST['url'], FILTER_SANITIZE_URL);
    echo"<br>";
    echo filter_var($_POST["text"], FILTER_SANITIZE_STRING);
    echo"<br>";
    echo filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    echo"<br>";
    echo filter_var($_POST["integer"], FILTER_SANITIZE_NUMBER_INT);
    echo"<br>";
    echo filter_var($_POST["float"], FILTER_SANITIZE_NUMBER_FLOAT);
    echo"<br>";


}

    echo"</div>";
    echo"</div>";

echo"</body>";
echo"</html>";
?>