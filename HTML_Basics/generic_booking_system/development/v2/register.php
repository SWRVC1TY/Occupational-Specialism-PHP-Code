<?php
session_start(); // opens our connection to the session
require_once "assets/dbconnect.php";
require_once "assets/common.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try{
        if (strlen($_POST['username'])>= 3 && strlen($_POST['username'])<= 15)
            if(is_user_unique(dbconnect_insert(),$_POST['username'])){ //checking username is valid
                if(create_new(dbconnect_insert(),$_POST)) { // creating the new user
                    $_SESSION["usermessage"] = "USER CREATED SUCCESSFULLY"; // displaying message to user
                    header("Location: login.php");
                    exit;
                }
            } elseif(!is_user_unique(dbconnect_insert(),$_POST['username'])) { // checking if username is unique
                $_SESSION["usermessage"] = "ERROR: USERNAME ALREADY TAKEN"; // displays apropriate message for the user
            } else {
                $_SESSION["usermessage"] = "ERROR: USER REGISTRATION FAILED";
            }
        else{
            $_SESSION["usermessage"] = "USERNAME LENGTH IS INCORRECT!"; // displaying message to user
        }
        } catch (PDOException $e) {
            //handle database errors
            error_log("User reg database error: " . $e->getMessage());
            throw new PDOException("User reg database error" . $e);
        } catch (Exception $e) {
            //catch any other errors
            error_log("User registration error: " . $e->getMessage());
            throw new Exception("User registration error" . $e);
        }
    }


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

echo"<div class = 'content'>";
echo"<h2>Register Here:</h2>";

echo usr_msg();

echo "Usernames must be 3-15 characters!";
echo "<form method='POST' action=''>"; // sends data to post
echo "<br>";
echo"<label for='username'> Username: </label>";
echo"<input type='text' name='username' placeholder='Username' required>";
echo"<br>";
echo"<label id='pass' for='pass'>Password: </label>";
echo"<input type='password' name='password' id='pass' placeholder='Password' Required>";
echo"<br>";
echo"<label id='fname' for='fname'> First Name: </label>";
echo"<input type='text' name='fname' id = 'fname' placeholder='First Name' required>";
echo"<br>";
echo"<label id='sname' for='sname'> Surname: </label>";
echo"<input type='text' name='sname' id = 'sname' placeholder='sname' required>";
echo"<br>";
echo"<label id='dob' for='dob'> Date of Birth: </label>";
echo"<input type='text' name='dob' id = 'dob' placeholder='DOB' required>";
echo"<br>";
echo"<label for='address'> Address: </label>";
echo"<input type='text' name='address' placeholder='Address' required>";
echo"<br>";
echo"<input id = submit type='submit' name='submit' value='Submit'>"; // submit button to submit data to post
echo"</form>";

echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";