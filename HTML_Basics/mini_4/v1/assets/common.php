<?php # stores reuseable code for all pages
function new_console($conn, $POST)
{
    try {
        /*we are preparing the statement to send of to the database to help prevent sql injection attacks*/
        $sql = "INSERT INTO console(manufacturer, console_name, release_date, controller_no, bit) VALUES(?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // bind parameters for security
        // this binds data from the form to the sql statement this makes it more secure from an sql injection attack
        // which makes it less likely for someone to hijack the sql statement
        $stmt->bindParam(1, $POST['manufacturer']);
        $stmt->bindParam(2, $POST['console_name']);
        $stmt->bindParam(3, $POST['release_date']);
        $stmt->bindParam(4, $POST['controllerno']);
        $stmt->bindParam(5, $POST['bit']);

        $stmt->execute(); // sends of data
        $conn = null; // closes connection
        return true;
    } catch (PDOException $e) {
        error_log("Audit Database error: " . $e->getMessage());
    } catch (Execption $e) {
        error_log("Auding error: " . $e->getMessage());
        throw new Exception("Auditing error: " . $e->getMessage());
    }

}

function is_user_unique($conn, $POST)
{

    $sql = "SELECT username FROM patient WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $POST);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) { // if the user name exists then return true
        return true;
    } else { // if not return false
        return false;
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
    $sql = "INSERT INTO audit(patientid,code,date,longdesc) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $date = date("Y-m-d"); // this is the only structure that is accepted
    $stmt->bindParam(1, $userid);
    $stmt->bindParam(2, $date);
    $stmt->bindParam(3, $long);
    $stmt->bindParam(4, $code);

    $stmt->execute();
    $conn = null;
    return true;
}
function login($conn, $usrname){
    try {  //try this code, catch errors
        $sql = "SELECT patientid, password FROM user WHERE username = ?"; //set up the sql statement
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
function getnewuserid($conn, $email){  # upon registering, retrieves the userid from the system to audit.
    $sql = "SELECT patientid FROM user WHERE username = ?"; //set up the sql statement
    $stmt = $conn->prepare($sql); //prepares
    $stmt->bindParam(1, $email);
    $stmt->execute(); //run the sql code
    $result = $stmt->fetch(PDO::FETCH_ASSOC);  //brings back results
    return $result["user_id"];
}
function staff_getter($conn){
    $sql = "SELECT staff_id, role, fname, sname, room WHERE role != ? ORDER BY role DESC";
    $stmt = $conn->prepare($sql);
    $exclude_role = "adm";
    $stmt->bindParam(1, $exclude_role);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $result;
}
function commit_booking($conn, $epoch){
    $sql = "INSERT INTO user () VALUES ()";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql

    $stmt->bindParam(1, $_POST['userid']);  //bind parameters for security
    // Hash the password
    $stmt->bindParam(2, $_POST['staff']);
    $stmt->bindParam(3, $epoch);
    $tmp = time();
    $stmt->bindParam(4, $tmp);

    $stmt->execute();  //run the query to insert
    $conn = null;  // closes the connection so cant be abused.
    return true; // Registration successful
}