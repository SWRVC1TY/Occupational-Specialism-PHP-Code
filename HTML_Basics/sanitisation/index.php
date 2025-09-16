<?php // opens php code section
session_start(); // opens our connection to the session
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

    echo"<div class = 'content'";

        echo "<form method='POST' action=''>"; // sends data to post
        echo"<label id='url' for='url'>URL: </label>"; // gets data from user
        echo"<input type='url' name='url' id = 'url' placeholder='URL' min='1' Required>";
        echo"<br>";
        echo"<label id='num' for='num'>Number: </label>"; // gets data from user
        echo"<input type='number' name='num' id = 'num' placeholder='Number of Tickets' min='1' Required>";
        echo"<br>";
        echo"<label id='num' for='num'>No of tickets: </label>"; // gets data from user
        echo"<input type='number' name='num' id = 'num' placeholder='Number of Tickets' min='1' Required>";
        echo"<br>";
        echo"<label id='email' for='email'> Email: </label>";
        echo"<input type='email' name='email' id = 'email' placeholder='Email' required>";
        echo"<br>";
        echo"<input id = submit type='submit' name='submit' value='Submit'>"; // submit button to submit data to post
        echo"</form>";

    echo"</div>";
    echo"</div>";

echo"</body>";
echo"</html>";
?>