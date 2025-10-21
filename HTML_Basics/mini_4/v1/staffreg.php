<?php
session_start(); // opens our connection to the session
require_once "assets/dbconnect.php";

require_once "assets/common.php";
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

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if(!is_user_unique(dbconnect_insert(), $_POST["username"])){

        if(create_new(dbconnect_insert(),$_POST)) {
            audit(dbconnect_insert(),getnewuserid(dbconnect_insert(), $_POST['username']), "reg","New user registered");
            $_SESSION["usermessage"] = "USER CREATED SUCCESSFULLY";
            header("Location: login.php");
            exit;

        } else {
            $_SESSION["usermessage"] = "ERROR: USER REGISTRATION FAILED";
        }
    } else {
        $_SESSION["usermessage"] = "ERROR: USERNAME CANNOT BE USED";
    }
    echo usr_msg();
}

echo "<form method='POST' action=''>"; // sends data to post
echo"<label id='fname' for='fname'> Frist Name: </label>";
echo"<input type='text' name='fname' id = 'fname' placeholder='fname' required>";
echo"<br>";
echo"<label id='sname' for='sname'> Surname: </label>";
echo"<input type='sname' name='sname' id = 'sname' placeholder='Surname' required>";
echo"<br>";
echo"<label id='pass' for='pass'>Password: </label>";
echo"<input type='password' name='password' id='pass' placeholder='Password' Required>";
echo"<br>";
echo"<label id='doc' for='doc'>Doctor</label>";
echo"<input type='radio' name='role' id = 'doc' value='doctor'>";
echo"<br>";
echo"<label id='nur' for='nur'>Nurse</label>";
echo"<input type='radio' name='role' id = 'nur' value='nurse'>";
echo"<br>";
echo"<label id='adm' for='adm'>Admin</label>";
echo"<input type='radio' name='role' id = 'adm' value='Admin'>";
echo"<br>";
echo"<input id = submit type='submit' name='submit' value='Submit'>"; // submit button to submit data to post
echo"</form>";

echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";