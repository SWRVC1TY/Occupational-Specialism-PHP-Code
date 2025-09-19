<?php
// opens php code section
session_start(); // opens our connection to the session
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";

echo "<title>Title</title>";
echo "<link rel='stylesheet' href='css/styles.css'>";

echo "</head>";

echo "<body>";
echo "<div class = 'container'>";
require_once "assets/top_bar.php";
require_once "assets/nav.php";

echo "<div class = 'content'";

echo "<form method='POST' action=''>"; // sends data to post
    echo"<label id='num' for='num'>No of tickets: </label>"; // gets data from user
    echo"<input type='number' name='num' id = 'num' placeholder='Number of Tickets' min='1' Required>";
    echo"<br>";
    echo"<label id='date' for='date'> Date: </label>";
    echo"<input type='date' name='date' id = 'date' placeholder='Date' required>";
    echo"<br>";
    echo"<label id='email' for='email'> Email: </label>";
    echo"<input type='email' name='email' id = 'email' placeholder='Email' required>";
    echo"<br>";
    echo"<label id='male' for='male'> Male: </label>";
    echo"<input type='radio' name='gender' id = 'male' value='Male'>";
    echo"<label id='female' for='female'> Female: </label>";
    echo"<input type='radio' name='gender' id = 'female' value='Male'>";
    echo"<br>";
    echo"<label id='pass' for='pass'>Password: </label>";
    echo"<input type='password' name='password' id='pass' placeholder='Password' Required>";
    echo"<br>";
    echo"<input id = submit type='submit' name='submit' value='Submit'>"; // submit button to submit data to post
echo"</form>";


echo "</div>";
echo "</div>";

echo "</body>";
echo "</html>";
