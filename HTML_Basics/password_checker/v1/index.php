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

    //Having a secure password is important because it protects your personal information, accounts, and digital identity from unauthorized access. Weak or easy-to-guess passwords make it easier for hackers to steal sensitive data, commit fraud, or take control of your accounts. A strong password acts as the first line of defense against cyber threats, helping keep your online activities safe and your private information out of the wrong hands.

    echo"</div>";
    echo"</div>";

echo"</body>";
echo"</html>";
?>