<?php

function usr_msg() {

    if (isset($_SESSION["message"])) {
        if (str_contains($_SESSION["message"], "ERROR" or str_contains($_SESSION["message"], "error"))) {
            $msg = "<div id = 'error'> USER MESSAGE: " . $_SESSION["message"] . "</div>";
        }
        else{
            $msg = $_SESSION["message"];
        }

        $msg = 'USER MESSAGE: '.$_SESSION["message"];
        $_SESSION[$msg] = "";
        unset($_SESSION["message"]);
        return $msg;
    }
    else{
        return "";
    }

}