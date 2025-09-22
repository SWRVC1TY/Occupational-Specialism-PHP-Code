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

    echo"<div class = 'content'>";
    echo"<br>";
    echo"<h2>Greetings! Welcome to my password strength checker.</h2>";

    echo"<p>Having a secure password is important because it protects your personal information, accounts, and digital identity from unauthorized access. Weak or easy-to-guess passwords make it easier for hackers to steal sensitive data, commit fraud, or take control of your accounts. A strong password acts as the first line of defense against cyber threats, helping keep your online activities safe and your private information out of the wrong hands.</p>";

    echo"<h2>Here are some basic tips before you make your password:</h2>";
echo"";

    echo"</div>";
    echo"</div>";

echo"</body>";
echo"</html>";