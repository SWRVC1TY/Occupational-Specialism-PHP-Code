<?php
session_start(); // opens our connection to the session

require_once "assets/dbconnect.php";

require_once "assets/common.php";

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    try{
        new_console(dbconnect_insert(), $_POST); // i have called a sub routine and then called another one due to if connection is successful then conn is returned
        $_SESSION['usermessage'] = "SUCCESS: Console Created!";
    } catch(PDOException $e){
        $_SESSION['usermessage'] = $e->getMessage();
    }
}

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
    is_user_unique(dbconnect_insert());
echo"<br>";
echo usr_msg();
echo"<br>";
echo "<form method='POST' action=''>"; // sends data to post
echo"<label id='manufacturer' for='manufacturer'> Manufacturer: </label>";
echo"<input type='text' name='manufacturer' id = 'manufacturer' placeholder='Manufacturer' required>";
echo"<br>";
echo"<label id='console_name' for='console_name'> Console Name: </label>";
echo"<input type='text' name='console_name' id = 'console_name' placeholder='Console Name' required>";
echo"<br>";
echo"<label id='release_date' for='release_date'> Release Date: </label>";
echo"<input type='date' name='release_date' id = 'release_date' placeholder='Release Date' required>";
echo"<br>";
echo"<label id='controllerno' for='controllerno'> Number of Controllers: </label>";
echo"<input type='number' name='controllerno' id = 'contollerno' placeholder='Controller Number' required>";
echo"<br>";
echo"<label id='bit' for='bit'> Bit: </label>";
echo"<input type='number' name='bit' id = 'bit' placeholder='Bit' required>";
echo"<br>";
echo"<input id = submit type='submit' name='submit' value='Submit'>"; // submit button to submit data to post
echo"</form>";

echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";