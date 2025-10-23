<?php // opens php code section

session_start();
require_once "assets/dbconnect.php";
require_once "assets/common.php";

if (!isset($_SESSION['userid'])) {  # If they have managed to get to this page without loggining
    $_SESSION['usermessage'] = "ERROR: You are not logged in!";
    header("Location: login.php");
    exit;
} elseif($_SERVER["REQUEST_METHOD"] === "POST") {
// this needs to load before anything else so it will actualy load rarther than crash due to if headers are in here and
// this is not before html code the headers will be loaded and the errors will get thrown
    $tmp = $_POST["apptdate"]. ' ' .$_POST["appttime"];
    $epoch = strtotime($tmp);
    if (appt_update(dbconnect_insert(), $_SESSION['apptid'],$epoch)){
    $_SESSION['usermessage'] = "Booking updated successfully!";
    unset ($_SESSION['apptid']);
        header("Location: bookins.php");
    }
    else{
        $_SESSION['usermessage'] = "ERROR: Your booking has not been confirmed";
        unset ($_SESSION['apptid']);
        header("Location: bookins.php");
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

$appt = appt_fetch(dbconnect_insert(), $_SESSION["apptid"]);

echo"<form method='post' action='''>";

$staff = staff_getter(dbconnect_insert());
$apt_time = date('H:i:s', $appt["appointmentdate"]);
$apt_date = date('Y-m-d', $appt["appointmentdate"]);
echo"<label for='appttime'> Appointment Time: </label>";
echo"<input type = 'time' name = 'appttime' value ='".$apt_time."'required>";
echo"<br>";
echo"<label for='apptdate'> Appointment date: </label>";
echo"<input type = 'date' name = 'apptdate' value ='".$apt_date."'required>";

echo"<br>";

echo"<select name='staff'>";

foreach ($staff as $staf){

    if ($staf['role'] == 'doc'){
        $role = "Doctor:";
    }
    else if ($staf['role'] == 'nur'){
        $role = "Nurse:";
    }
    if ($appt['staffid'] == $staf['staffid']){
        $selected = "selected";
    } else {
        $selected = "";
    }
    echo"<option value='".$staf['staffid']." ".$selected."'>".$role." ".$staf['sname']." ".$staf['fname']." "."Room ".$staf['room']."</option>";

}
echo"<input type='submit' name='submit' value='Submit'>";
echo"</form>";

echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";
?>