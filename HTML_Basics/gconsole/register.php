<?php
session_start(); // opens our connection to the session
echo"<!DOCTYPE html>";
echo"<html>";
echo "<head>";

echo"<title>Register</title>";
echo"<link rel='stylesheet' href='css/styles.css'>";

echo"</head>";

echo"<body>";
echo"<div class = 'container'>";
require_once "assets/top_bar.php";
require_once "assets/nav.php";

echo"<h2>Register:</h2>";
echo"<div class = 'content'>";

echo "<form method='POST' action=''>"; // sends data to post
echo"<label id='email' for='email'> Email: </label>";
echo"<input type='email' name='email' id = 'email' placeholder='Email' required>";
echo"<br>";
echo"<label id='username' for='username'> Username: </label>";
echo"<input type='text' name='username' id = 'username' placeholder='Username' required>";
echo"<br>";
echo"<label id='pass' for='pass'>Password: </label>";
echo"<input type='password' name='password' id='pass' placeholder='Password' Required>";
echo"<br>";
echo"<input id = submit type='submit' name='submit' value='Submit'>"; // submit button to submit data to post
echo"</form>";

echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";