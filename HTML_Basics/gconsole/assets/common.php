<?php # stores reuseable code for all pages
function new_console($conn, $post)
{
    try {
        /*we are preparing the statement to send of to the database to help prevent sql injection attacks*/
        $sql = "INSERT INTO console(manufacturer, console_name, release_date, controller_no, bit) VALUES(?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // bind parameters for security
        // this binds data from the form to the sql statement this makes it more secure from an sql injection attack
        // which makes it less likely for someone to hijack the sql statement
        $stmt->bindParam(1, $post['manufacturer']);
        $stmt->bindParam(2, $post['console_name']);
        $stmt->bindParam(3, $post['release_date']);
        $stmt->bindParam(4, $post['controller_no']);
        $stmt->bindParam(5, $post['bit']);

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

function usr_msg()
{

    if (isset($_SESSION)) { // checks if session variable is empty
        if (str_contains($_SESSION["usermessage"], "ERROR") or str_contains($_SESSION["usermessage"], "error")) { // if it contains an error its red
            $msg = "<div id = 'error'> USER MESSAGE: " . $_SESSION["usermessage"] . "</div>";
        } else {
            $msg = "<div id = 'none'> USER MESSAGE: " . $_SESSION["usermessage"] . "</div>"; // if not its green
        }

        $_SESSION[$msg] = ""; // wipes session var
        unset($_SESSION["message"]);// unsets session var
        return $msg;
    } else {
        return "";
    }

}