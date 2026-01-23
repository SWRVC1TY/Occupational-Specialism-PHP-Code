<?php # stores reuseable code for all pages

function is_user_unique($conn, $user)
{

    $sql = "SELECT username FROM users WHERE username = ?";
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

        /*we are preparing the statement to send of to the database to help prevent sql injection attacks*/
        $sql = "INSERT INTO users(username, password, fname, sname, dob) VALUES(?, ?, ?, ?,?)";
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
        $sql = "SELECT userid, password FROM user WHERE username = ?"; //set up the sql statement
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
function commit_booking($conn, $epoch,$post){
    $sql = "INSERT INTO booking (userid,appdate,type,datebooked,location) VALUES (?,?,?,?,?)";  //prepare the sql to be sent
    $stmt = $conn->prepare($sql); //prepare to sql
    // bind parameters for security
    // this binds data from the form to the sql statement this makes it more secure from an sql injection attack
    // which makes it less likely for someone to hijack the sql statement
    $stmt->bindParam(1, $_SESSION['userid']);
    $tmp = time();
    $stmt->bindParam(2, $epoch);
    $stmt->bindParam(3, $post);
    $stmt->bindParam(4, $tmp);
    $stmt->bindParam(5, $post);

    $stmt->execute();  //run the query to insert
    $conn = null;  // closes the connection so cant be abused.
    return true; // Registration successful
}
