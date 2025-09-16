<?php
function usr_msg()
{

    if (isset($_SESSION["message"])) { // checks if session variable is empty
        if (str_contains($_SESSION["message"], "ERROR") or str_contains($_SESSION["message"], "error")) { // if it contains an error its red
            $msg = "<div id = 'error'> USER MESSAGE: " . $_SESSION["message"] . "</div>";
        } else {
            $msg = "<div id = 'none'> USER MESSAGE: " . $_SESSION["message"] . "</div>"; // if not its green
        }

        $_SESSION[$msg] = ""; // wipes session var
        unset($_SESSION["message"]);// unsets session var
        return $msg;
    } else {
        return "";
    }

}