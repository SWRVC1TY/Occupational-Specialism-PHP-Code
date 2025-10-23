<?php
session_start(); // opens our connection to the session
require_once "assets/dbconnect.php";
require_once "assets/common.php";

if(isset($_SESSION['userid'])){
    $_SESSION['usermessage'] = "ERROR: You are already logged in!";
    header("Location: index.php");
    exit; // Stop further execution
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usr = login(dbconnect_insert(), $_POST["username"]);

    if ($usr && password_verify($_POST["password"], $usr["password"])) { // verifies the password is matched
        $_SESSION["userid"] = $usr["patientid"];
        $_SESSION['usermessage'] = "SUCCESS: User Successfully Logged In";
        audit(dbconnect_insert(), $_SESSION["userid"], "log", "User has successfully logged in");
        header("location:index.php");  //redirect on success
        exit;
    } elseif (!$usr) {
        $_SESSION['usermessage'] = "ERROR: User not found";
        header("Location: login.php");
        exit; // Stop further execution
    } else {
        $_SESSION['usermessage'] = "ERROR: User login passwords not match";
        if ($usr["patientid"]) {
            audit(dbconnect_insert(), $usr["patientid"], "flo", "User has unsuccessfully logged in");
            header("Location: login.php");
            exit; // Stop further execution
        }
    }
}
echo"<!DOCTYPE html>";
echo"<html>";
echo "<head>";

echo"<title>Login</title>";
echo"<link rel='stylesheet' href='css/styles.css'>";

echo"</head>";

echo"<body>";
echo"<div class = 'container'>";
require_once "assets/top_bar.php";
require_once "assets/nav.php";
echo"<h2>Login:</h2>";
echo"<div class = 'content'>";

echo "<form method='POST' action=''>"; // sends data to post
echo"<label id='username' for='username'> Username: </label>";
echo"<input type='text' name='username' id = 'username' placeholder='Username' required>";
echo"<br>";
echo"<label id='pass' for='pass'>Password: </label>";
echo"<input type='password' name='password' id='pass' placeholder='Password' Required>";
echo"<br>";
echo"<input id = submit type='submit' name='submit' value='Submit'>"; // submit button to submit data to POST
echo"</form>";

echo usr_msg();


echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";