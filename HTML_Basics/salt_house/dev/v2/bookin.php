<?php

session_start();

require_once "assets/dbconnect.php";
require_once "assets/common.php";
$rooms = getrooms(dbconnect_insert());
$services = getservices(dbconnect_insert());
if (!isset($_SESSION['userid'])) {  # If they have managed to get to this page without loggining
    $_SESSION['usermessage'] = "ERROR: You are not logged in!";
    header("Location: login.php");
    exit;
} elseif($_SERVER["REQUEST_METHOD"] === "POST") {
// this needs to load before anything else so it will actualy load rarther than crash due to if headers are in here and
// this is not before html code the headers will be loaded and the errors will get thrown

    try {
        $start = $_POST["appt_date"] . " " . $_POST["start_time"];
        $end = $_POST["appt_date"] . " " . $_POST["end_time"];
        $epochstart = strtotime($start); // pre assining to a variable to help reduce the risk of errors (this is the best practice)
        $epochend = strtotime($end); // pre assining to a variable to help reduce the risk of errors (this is the best practice)
        $epoch = strtotime(time());
        $totalprice = get_total(dbconnect_insert(),$epochstart,$epochend,$_POST);

        if(commit_booking(dbconnect_insert(),$epochstart,$epochend,$epoch,$totalprice,$_POST)) {
            if (linkservices(dbconnect_insert(), $_POST))
            $_SESSION['usermessage'] = "SUCESS: Your booking has been confirmed";
        } else {
            $_SESSION['usermessage'] = "ERROR: Your booking has not been confirmed";
        }

    } catch (PDOException $e) {
        $_SESSION['usermessage'] = $e->getMessage();
    } catch (Exception $e) {
        $_SESSION['usermessage'] = $e->getMessage();
    }


}

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
echo usr_msg();
echo "Please specify your booking date and time below:";
echo"<form action='' method='post' >";

echo"<label for='start_time'> Start Time: </label>";
echo"<input type = 'time' name ='start_time' required>";

echo"<br>";

echo"<label for='end_time'> End Time: </label>";
echo"<input type = 'time' name ='end_time' required>";

echo"<br>";

echo"<label for='appt_date'> Booking Date: </label>";
echo"<input type = 'date' name ='appt_date' required>";

echo"<br>";

echo"<label for='guests'> Guests: </label>";
echo"<input type = 'number' name ='guests' required>";

echo"<br>";
echo"<label for='room'> room: </label>";
echo"<select name='room'>";
foreach ($rooms as $room) {
    echo "<option value='{$room['roomid']}'>{$room['roomname']}</option>";
}
echo"</select>";
echo"<br>";
echo"<label for='services'> Services: </label>";
echo"<br>";
foreach ($services as $service) {
    echo "<label>";
    echo "<input type='checkbox' name='services[]' value='" .$service['serviceid']. "'>";
    echo $service['servicename'];
    echo "</label><br>";
}
echo"<br>";
echo"<input type='submit' name='submit' value='Submit'>";
echo"</form>";

echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";