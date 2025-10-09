<?php // opens php code section
if (!isset($_GET['message'])) {
    session_start();
    $message = false;
}else{
    $message = htmlspecialchars($_GET['message']);
} // opens our connection to the session
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

    //content here

    echo"</div>";
    echo"</div>";

echo"</body>";
echo"</html>";
?>