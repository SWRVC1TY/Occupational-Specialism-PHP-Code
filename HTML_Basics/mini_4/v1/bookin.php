<?php // opens php code section
require_once "assets/dbconnect.php";
require_once "assets/common.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// this needs to load before anything else so it will actualy load rarther than crash due to if headers are in here and
// this is not before html code the headers will be loaded and the errors will get thrown

    try {


        $tmp = $_POST["appt_date"] . " " . $_POST["appt_time"];
        $epoch = strtotime($tmp); // pre assining to a variable to help reduce the risk of errors (this is the best practice)
        if(commit_booking(dbconnect_insert(),$epoch)){
            $_SESSION['usermessage'] = "SUCESS: Your booking has been confirmed";
            header("location: bookings.php");
            exit;
        } else {
            $_SESSION['usermessage'] = "ERROR: Your booking has not been confirmed";
        }

    } catch (PDOException $e) {
        $_SESSION['usermessage'] = $e->getMessage();
    } catch (Exception $e) {
        $_SESSION['usermessage'] = $e->getMessage();
    }


}
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

echo"<form method = 'POST' action = ''>";

$staff = staff_getter(dbconnect_insert());

echo"<label for='appt_time'> Appointment Time: </label>";
echo"<input type = 'time' name = 'appt_time' required>";

echo"<label for='appt_date'> Appointment date: </label>";
echo"<input type = 'date' name = 'appt_date' required>";

echo"<br>";

echo"<select name='staff'>";

foreach ($staff as $staf){

    if ($staf['role'] == 'doc'){
        $role = "doc";
    }
    else if ($staf['role'] == 'nur'){
        $role = "nurse";
    }
    echo"<option value='".$staf['staff_id']."'>".$role."".$staf['sname']."".$staf['fname']."Room".$staf['room']."</option>";
}

echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";
?>