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

    $user = $POST["username"];
    $sql = "SELECT username FROM user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $user);
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
        $sql = "INSERT INTO user(username, password, signupdate, dob, country) VALUES(?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // bind parameters for security
        // this binds data from the form to the sql statement this makes it more secure from an sql injection attack
        // which makes it less likely for someone to hijack the sql statement
        $stmt->bindParam(1, $POST['username']);
        $stmt->bindParam(2, $POST['password']);
        $stmt->bindParam(3, $POST['signup']);
        $stmt->bindParam(4, $POST['dob']);
        $stmt->bindParam(5, $POST['country']);

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
