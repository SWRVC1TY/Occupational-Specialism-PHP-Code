<?php
// opens php code section
session_start();
require_once "assets/dbconnect.php";
require_once "assets/common.php";

if (!isset($_SESSION['userid'])) {  # If they have managed to get to this page without loggining
    $_SESSION['usermessage'] = "ERROR: You are not logged in!";
    header("Location: login.php");
    exit;
} elseif($_SERVER["REQUEST_METHOD"] === "POST") {
    if(isset($_POST['appdelete'])){
        try{
            if(cancel_booking(dbconnect_insert(), $_POST['bookingid'])){
                $_SESSION['usermessage'] = "SUCCESS: Your Appointment was cancelled";
                header("location: bookins.php");
                exit;
            } else {
                $_SESSION['usermessage'] = "ERROR: Could not able to execute complete this action";
            }

        } catch(PDOException $e) {
            $_SESSION['message'] = "ERROR: ".$e->getMessage();
        } catch (Exception $e){
            $_SESSION['message'] = "ERROR: ".$e->getMessage();
        }
    } elseif (isset($_POST['appchange'])) {
        $_SESSION['bookingid'] = $_POST['bookingid'];
        header('Location: alterbookings.php');
        exit;
    }
}
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";

echo "<title>Title</title>";
echo "<link rel='stylesheet' href='css/styles.css'>";

echo "</head>";

echo "<body>";
echo "<div class = 'container'>";
require_once "assets/top_bar.php";
require_once "assets/nav.php";

echo "<div class = 'content'>";
echo usr_msg();
echo"<p> Below are bookin</p>";
$appts = booking_getter(dbconnect_insert());
if (!$appts) {
    echo "LAD THERE NO BLOODY BOOKINS";
} else {

    echo "<table>";
    foreach ($appts as $appt) {
        echo"<form action='' method='POST'>";

        echo "<tr>";
        /* opening time to output text i am using the built in date function and giving it an epoch time and giving it a set format
        this format will give me the date of the appointment with and @ symbole and the time */
        echo "<td> Date:".date('M d,Y', $appt["starttime"]) ."</td>";
        echo "<td> Starts:"."   ".date('h:i A', $appt["starttime"]) ."</td>";
        echo "<td> Ends:"."   ".date('h:i A', $appt["endtime"]) ."</td>";
        echo "<td> Made on:"."   ".date('M d,Y @ h:i A', $appt["dateofbooking"]) ."</td>";
        echo "<td> Room:"."   ".$appt['roomname']."</td>";
        echo "<td> Guests:"."   " .intval($appt['guests'])."</td>";
        echo "<td> Services:" ."    ".$appt['services']."</td>";
        echo "<td> Total Cost:" ."   ".intval($appt['total_price'])."</td>";
        echo "<td> <input type='hidden' name='bookingid' value=".$appt["bookingid"].">
        <input type='submit' name='appdelete' value='Cancel Booking' />
                   <input type='submit' name='appchange' value='Change Booking' /></td>";
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>";
}

echo "</div>";
echo "</div>";

echo "</body>";
echo "</html>";
