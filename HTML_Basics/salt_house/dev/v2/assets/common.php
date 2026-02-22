<?php # stores reuseable code for all pages

function is_user_unique($conn, $user)
{

    $sql = "SELECT username FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $user);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;  // nulls off the connection so cant be abused.
    if ($result) { // if the username exists then return true
        return false;
    } else { // if not return false
        return true;
    }
}


function create_new($conn, $POST)
{

    /*we are preparing the statement to send of to the database to help prevent sql injection attacks*/
    $sql = "INSERT INTO users(username, password, fname, sname, dob,email) VALUES(?, ?, ?, ?,?,?)";
    $stmt = $conn->prepare($sql);

    // bind parameters for security
    // this binds data from the form to the sql statement this makes it more secure from an sql injection attack
    // which makes it less likely for someone to hijack the sql statement
    $stmt->bindParam(1, $POST['username']);
    // Hash the password
    $hpswd = password_hash($POST['password'], PASSWORD_DEFAULT);  //hashes the password
    $stmt->bindParam(2, $hpswd);
    $stmt->bindParam(3, $POST['fname']);
    $stmt->bindParam(4, $POST['sname']);
    $stmt->bindParam(5, $POST['dob']);
    $stmt->bindParam(6, $POST['email']);


    $stmt->execute(); // sends of data
    $conn = null;//closes the connection so it can't be abused by packet sniffers
    return true;
}
function usr_msg()
{

    if (isset($_SESSION["usermessage"])) { // checks if session variable is empty
        if (str_contains($_SESSION["usermessage"], "ERROR") or str_contains($_SESSION["usermessage"], "error")) { // if it contains an error its red
            $msg = "<div id = 'error'> USER MESSAGE: " . $_SESSION["usermessage"] . "</div>";
        } else {
            $msg = "<div id = 'none'> USER MESSAGE: " . $_SESSION["usermessage"] . "</div>"; // if not its green
        }

        $_SESSION[$msg] = ""; // wipes session var
        unset($_SESSION["usermessage"]);// unsets session var
        return $msg;
    } else {
        return "";
    }

}
function login($conn, $usrname){
    try {  //try this code, catch errors
        $sql = "SELECT userid, password FROM users WHERE username = ?"; //set up the sql statement
        $stmt = $conn->prepare($sql); //prepares
        $stmt->bindParam(1,$usrname);  //binds the parameters to execute
        $stmt->execute(); //run the sql code
        $result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results
        $conn = null;  // nulls off the connection so cant be abused.

        if($result){  // if there is a result returned
            return $result;

        } else {
            $_SESSION['usermessage'] = "User not found";
            header("Location: login.php");
            exit; // Stop further execution
        }

    } catch (Exception $e) {
        $_SESSION['usermessage'] = "User login".$e->getMessage();
        header("Location: login.php");
        exit; // Stop further execution
    }
}
function getrooms($conn){
    $sql = "SELECT * FROM rooms";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;  // nulls off the connection so cant be abused.
    return $result;
}
function getservices($conn){
    $sql = "SELECT * FROM services";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;  // nulls off the connection so cant be abused.
    return $result;
}
function getnewuserid($conn, $username){  # upon registering, retrieves the userid from the system to audit.
    $sql = "SELECT userid FROM users WHERE username = ?"; //set up the sql statement
    $stmt = $conn->prepare($sql); //prepares
    // bind parameters for security
    // this binds data from the form to the sql statement this makes it more secure from an sql injection attack
    // which makes it less likely for someone to hijack the sql statement
    $stmt->bindParam(1, $username);
    $stmt->execute(); //run the sql code
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results
    return $result['userid'];
}
function get_total($conn,$startEpoch,$endEpoch,$post){
    $additionalcharge = additional_charge_check($startEpoch,$endEpoch);
    $total = 300 + $additionalcharge; // set due to room base price
    foreach ($_POST['services'] as $service_id) {
        $sql = "SELECT sprice FROM services WHERE serviceid = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1,$service_id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total += $result['sprice'];
    }
    $conn = null;  // nulls off the connection so cant be abused.
    return $total;
}

function check_guests($guests){
    if ($guests > 0 && $guests <=200 ){
        return true;
    }
    else{
        $_SESSION['usermessage'] = "Invalid number of guests";
        return false;
    }
}
function check_start_time($startEpoch)
{
    $startMins = ((int)date('H', $startEpoch) * 60)
        + (int)date('i', $startEpoch);

    if ($startMins < 360) { // 6 * 60
        $_SESSION['usermessage'] = "ERROR: Cannot book before 6AM.";
        return false;
    }

    return true;
}
function additional_charge_check($startEpoch,$endEpoch){

    $additionalcharge = 0;

    $startMins = ((int)date('H', $startEpoch) * 60)
        + (int)date('i', $startEpoch);

    if ($startMins < 540) { // before 9AM
        $additionalcharge += 100;
    }

    $endMins = ((int)date('H', $endEpoch) * 60)
        + (int)date('i', $endEpoch);

    if ($endMins > 1320) { // after 10PM
        $additionalcharge += 100;
    }

    return $additionalcharge;
}
function check_end_time($endEpoch,$startEpoch)
{
    if ($endEpoch <= $startEpoch) {
        $_SESSION['usermessage'] = "ERROR: End time must be after start time.";
        return false;
    }

    $endMins = ((int)date('H', $endEpoch) * 60)
        + (int)date('i', $endEpoch);

    if ($endMins > 1440) {
        $_SESSION['usermessage'] = "ERROR: Booking must end by midnight.";
        return false;
    }

    return true;
}
function commit_booking($conn, $starttime,$endtime,$epoch,$totalprice,$post){
    $sql = "INSERT INTO bookings (userid,roomid,dateofbooking,starttime,endtime,guests,totalprice) VALUES (?,?,?,?,?,?,?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql
    // bind parameters for security
    // this binds data from the form to the sql statement this makes it more secure from an sql injection attack
    // which makes it less likely for someone to hijack the sql statement
    $stmt->bindParam(1, $_SESSION['userid']);
    $tmp = time();
    $stmt->bindParam(2, $_POST['room']);
    $stmt->bindParam(3, $epoch);
    $stmt->bindParam(4, $starttime);
    $stmt->bindParam(5, $endtime);
    $stmt->bindParam(6, $_POST['guests']);
    $stmt->bindParam(6, $_POST['totalprice']);

    $stmt->execute();  //run the query to insert
    $conn = null;  // closes the connection so cant be abused.
    return true; // Registration successful
}
function getmostrecentbooking($conn){
    $sql = "SELECT bookingid FROM bookings WHERE userid = ? ORDER BY dateofbooking DESC LIMIT 1;";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_SESSION['userid']);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results
    $conn = null;  // nulls off the connection so cant be abused.
    return $result['bookingid'];
}
function linkservices($conn, $post){
    $bookingid = getmostrecentbooking($conn);
    foreach ($_POST['services'] as $service_id) {
        $sql = "INSERT INTO bookingservices (bookingid,serviceid) VALUES (?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $bookingid);
        $stmt->bindParam(2, $service_id);
        $stmt->execute();
    }
    $conn = null;  // nulls off the connection so cant be abused.
    return true;
}