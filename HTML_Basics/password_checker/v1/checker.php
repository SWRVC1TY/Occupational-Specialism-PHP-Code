<?php
// opens php code section
session_start(); // opens our connection to the session
require_once "assets/common.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") { // selection statment to see if any data has been sent to POST
    $password = $_POST["password"];
    $rules = password_verification($password);
}
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

echo "<div class = 'content'>";
echo"<h2>Please check your password!</h2>";
echo "<form method='POST' action=''>"; // sends data to post
    echo"<br>";
    echo"<label id='pass' for='pass'>Password: </label>";
    echo"<input type='password' name='password' id='pass' placeholder='Password' Required>";
    echo"<br>";
    echo"<input id = submit type='submit' name='submit' value='Submit'>"; // submit button to submit data to post
echo"</form>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    display_rules($rules);

}

echo "</div>";
echo "</div>";

echo "</body>";
echo "</html>";
