<?php # stores reuseable code for all pages

function is_user_unique($conn, $user)
{

    $sql = "SELECT username FROM patient WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $user);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) { // if the user name exists then return true
        return false;
    } else { // if not return false
        return true;
    }
}


function create_new($conn, $POST)
{

    try {
        /*we are preparing the statement to send of to the database to help prevent sql injection attacks*/
        $sql = "INSERT INTO patient(username,first_name, second_name, dob, password) VALUES(?, ?, ?, ?,?)";
        $stmt = $conn->prepare($sql);

        // bind parameters for security
        // this binds data from the form to the sql statement this makes it more secure from an sql injection attack
        // which makes it less likely for someone to hijack the sql statement
        $stmt->bindParam(1, $POST['username']);
        $stmt->bindParam(2, $POST['fname']);
        $stmt->bindParam(3, $POST['sname']);
        // Hash the password
        $hpswd = password_hash($POST['password'], PASSWORD_DEFAULT);  //has the password
        $stmt->bindParam(4, $POST['dob']);
        $stmt->bindParam(5, $hpswd);

        $stmt->execute(); // sends of data
        $conn = null;//closes the connection so it can't be abused by packet sniffers
        return true;
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

function audit($conn, $userid, $code,$long){
    $sql = "INSERT INTO audit(patientid,code,longdesc,date) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    // bind parameters for security
    // this binds data from the form to the sql statement this makes it more secure from an sql injection attack
    // which makes it less likely for someone to hijack the sql statement
    $date = date("Y-m-d"); // this is the only structure that is accepted
    $stmt->bindParam(1, $userid);
    $stmt->bindParam(2, $code);
    $stmt->bindParam(3, $long);
    $stmt->bindParam(4, $date);

    $stmt->execute();
    $conn = null;
    return true;
}
function login($conn, $usrname){
    try {  //try this code, catch errors
        $sql = "SELECT patientid, password FROM patient WHERE username = ?"; //set up the sql statement
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
function getnewuserid($conn, $username){  # upon registering, retrieves the userid from the system to audit.
    $sql = "SELECT patientid FROM patient WHERE username = ?"; //set up the sql statement
    $stmt = $conn->prepare($sql); //prepares
    // bind parameters for security
    // this binds data from the form to the sql statement this makes it more secure from an sql injection attack
    // which makes it less likely for someone to hijack the sql statement
    $stmt->bindParam(1, $username);
    $stmt->execute(); //run the sql code
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results
    return $result['patientid'];
}
function staff_getter($conn){
    $sql = "SELECT staffid, fname, sname, role, room FROM STAFF WHERE role != ? ORDER BY role DESC";
    $stmt = $conn->prepare($sql);
    // bind parameters for security
    // this binds data from the form to the sql statement this makes it more secure from an sql injection attack
    // which makes it less likely for someone to hijack the sql statement
    $exclude_role = "adm"; // excluding the admin role as it is not needed as an option in the bokking system
    $stmt->bindParam(1, $exclude_role);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $result;
}
function commit_booking($conn, $epoch){
    $sql = "INSERT INTO bookings (patientid,staffid,dateofbooking,appointmentdate) VALUES (?,?,?,?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql
    // bind parameters for security
    // this binds data from the form to the sql statement this makes it more secure from an sql injection attack
    // which makes it less likely for someone to hijack the sql statement
    $stmt->bindParam(1, $_SESSION['userid']);
    $stmt->bindParam(2, $_POST['staff']);
    $tmp = time();
    $stmt->bindParam(3, $tmp);
    $stmt->bindParam(4, $epoch);

    $stmt->execute();  //run the query to insert
    $conn = null;  // closes the connection so cant be abused.
    return true; // Registration successful
}
function appt_getter($conn){
    /* all the field names have a letter before the column this is referanceing to a table in a database
    so b would be bookings and s is the staff table we use bookings b to be able to use b as a referance same as staff s
    on is telling where to do the join*/
    $sql = "SELECT b.bookingid, b.patientid, b.appointmentdate, b.dateofbooking, s.role, s.fname, s.sname, s.room FROM bookings b JOIN staff s on 
    b.staffid = s.staffid WHERE b.patientid = ? ORDER BY b.appointmentdate ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_SESSION['userid']);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    if($result){
        return $result;
    }else {
        return false;
    }

}

function cancel_appt($conn, $aptid){
    $sql = "DELETE FROM bookings WHERE bookingid = ?"; // sql statment to delete the booking
    $stmt = $conn->prepare($sql); // preparing the statment for execution
    $stmt->bindParam(1, $aptid);// binding parameters for security
    $stmt->execute();// executes the statment
    $conn = null; // closes the connection to the database
    return true; // confirms that the sql has happened
}

function appt_fetch($conn, $bookingid){
    $sql = "SELECT * FROM bookings WHERE bookingid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $bookingid);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $conn = null;
    return $result;
}

function appt_update($conn, $bookingid, $appttime){
    $sql = "UPDATE bookings SET staffid = ?, appointmentdate = ? WHERE bookingid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $_POST['staff']);
    $stmt->bindParam(2, $appttime);
    $stmt->bindParam(3, $bookingid);
    $stmt->execute();
    $conn = null;
    return true;
}

function staff_audit($conn, $userid, $code,$long){
    $sql = "INSERT INTO saudit(patientid,code,longdesc,date) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $date = date("Y-m-d"); // this is the only structure that is accepted
    $stmt->bindParam(1, $userid);
    $stmt->bindParam(2, $code);
    $stmt->bindParam(3, $long);
    $stmt->bindParam(4, $date);

    $stmt->execute();
    $conn = null;
    return true;
}