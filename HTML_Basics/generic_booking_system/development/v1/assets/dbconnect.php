<?php

function dbconnect_insert(){
    /*this is an awful way as these are stored in plain text in the code base,very insecure.
    you would save credentials on a file that is saved outside the servers folder structure
    so only the software can access it!! instead of PDO we can use mysqli, but we don't because it is slowing being push out
    and is no longer accepted as good practice. PDO will connect to any type of data source with 1 command set, so if we migrated database systems
    we would need to change 1 line of code, and we can establish a new connection*/

    $servername = "localhost"; // sets server name
    $dbusername = "root"; // name of the user
    $dbpassword = "";// users password
    $dbname = "database"; // database name

    try{ // trying code and catching errors
        $conn = new PDO("mysql:host=$servername;port=3306;dbname=$dbname", $dbusername, $dbpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e){
        error_log("Database error in super_checker".$e->getMessage());
        // throws the exception
        throw $e; // re throws the exception
    }

}