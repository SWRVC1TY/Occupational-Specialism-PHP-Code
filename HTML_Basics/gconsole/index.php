<?php
session_start(); // opens our connection to the session
require_once "assets/dbconnect.php";
echo"<!DOCTYPE html>";
echo"<html>";
echo "<head>";

echo"<title>Home</title>";
echo"<link rel='stylesheet' href='css/styles.css'>";

echo"</head>";

echo"<body>";
echo"<div class = 'container'>";
require_once "assets/top_bar.php";
require_once "assets/nav.php";

echo"<h2>Welcome to gaming hub's console tracker!</h2>";

echo"<div class = 'content'>";

echo"<p>This is my website.......<br>Insert content here...</p>";


echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";
?>