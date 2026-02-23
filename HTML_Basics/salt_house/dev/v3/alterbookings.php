<?php // opens php code section

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
    $tmp = $_POST["bookingdate"]. ' ' .$_POST["starttime"];
    $tmp2 = $_POST["bookingdate"]. ' ' .$_POST["endtime"];
    $starttime = strtotime($tmp);
    $endtime = strtotime($tmp2);
    $totalprice = get_total(dbconnect_insert(),$starttime,$endtime,$_POST);
    if (booking_update(dbconnect_insert(),$starttime,$endtime,$totalprice,$_POST)){
    $_SESSION['usermessage'] = "Booking updated successfully!";
    unset ($_SESSION['bookingid']);
        header("Location: viewbookings.php");
    }
    else{
        $_SESSION['usermessage'] = "ERROR: Your booking has not been confirmed";
        unset ($_SESSION['bookingid']);
        header("Location: viewbookings.php");
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

$booking = fetch_booking(dbconnect_insert(), $_SESSION["bookingid"]);

echo"<form method='post' action='''>";

$bookingstart = date('H:i:s', $booking["starttime"]);
$bookingend = date('H:i:s', $booking["endtime"]);
$bookingdate = date('Y-m-d', $booking["starttime"]);
echo"<label for='bookingdate'> Start Date: </label>";
echo"<input type = 'date' name = 'bookingdate' value ='".$bookingdate."'required>";
echo"<br>";
echo"<label for='starttime'> Start Time: </label>";
echo"<input type = 'time' name = 'starttime' value ='".$bookingstart."'required>";
echo"<br>";
echo"<label for='endtime'> End time: </label>";
echo"<input type = 'time' name = 'endtime' value ='".$bookingend."'required>";
echo"<br>";
echo"<label for='room'> room: </label>";
echo"<select name='room'>";
foreach ($rooms as $room) {
    $selected = ((int)$room['roomid'] === (int)$booking['roomid']) ? "selected" : "";
    echo "<option value='{$room['roomid']}' $selected>{$room['roomname']}</option>";
}
echo"</select>";
echo"<br>";
echo"<label for='guests'> Guests: </label>";
echo"<input type = 'number' name = 'guests' value ='".$booking['guests']."'required>";
echo"<br>";
foreach ($services as $service) {
    echo "<label>";
    if (str_contains($booking["services"], $service['servicename'])) {
        echo "<input type='checkbox' name='services[]' value='" . $service['serviceid'] . "'checked>";
        echo $service['servicename'];
    }
    else{
        echo "<input type='checkbox' name='services[]' value='" . $service['serviceid'] . "'>";
        echo $service['servicename'];
    }
    echo "</label><br>";
}
echo"<br>";


echo"<input type='submit' name='submit' value='Submit'>";
echo"</form>";

echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";
?>