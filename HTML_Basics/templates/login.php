<?php
session_start();

require_once("dbconnect.php");
require_once("functions.php");

if(!isset($_SESSION["user"])){
    $_SESSION["usermessage"] = "ERROR: You are already logged in.";
    header("Location: index.php");
    exit;
}