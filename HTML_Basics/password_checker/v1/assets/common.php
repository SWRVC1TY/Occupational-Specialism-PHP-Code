<?php
function password_verification($password)
{
$rules = [];
$tally = 0;

    if(strlen($password)>=8) {
        $rules[0] = 'true';// length is at least 8
        $tally++;
    }
    else
        $rules[0] = 'false';

    if(preg_match('/[A-Z]/',$password)) {
        $rules[1] = 'true';// found uppercase
        $tally++;
    }
    else
        $rules[1] = 'false';

    if(preg_match('/[a-z]/',$password)) {
        $rules[2] = 'true';// found lowercase
        $tally++;
    }
    else
        $rules[2] = 'false';

    if(preg_match('/[0-9]/',$password)) {
        $rules[3] = 'true';// found a number
        $tally++;
    }
    else
        $rules[3] = 'false';

    if(preg_match('/[^a-zA-Z0-9_]/',$password)) {
        $rules[4] = 'true';// found a letter that isn't a character
        $tally++;
    }
    else
        $rules[4] = 'false';

    if (!str_contains(strtolower($password), 'password')) {
        $rules[5] = 'true';  // good password (doesn't contain "password")
        $tally++;
    }
    else
        $rules[5] = 'false'; // bad password

    if (!preg_match('/[^a-zA-Z0-9_]/', $password[0])) {
        $rules[6] = 'true';// no special char at the start
        $tally++;
    }
    else
        $rules[6] = 'false';

    $lastChar = $password[strlen($password) - 1];
    if (!preg_match('/[^a-zA-Z0-9_]/', $lastChar)) {
        $rules[7] = 'true'; // no special char at the end
        $tally++;
    }
    else
        $rules[7] = 'false';

    if (!preg_match('/[0-9]/', $lastChar)) {
        $rules[8] = 'true'; // no number at the end
        $tally++;
    }

    else
        $rules[8] = 'false';
    $rules[9] = $tally;


    return $rules;
}
function display_rules($rules,$password)
{
    if ($rules[0] === 'false') {
        echo "<p id='error'>This password does not meet the length requirement of 8!</p>";
    } else {
        echo "<p id='none'>This password meets the length requirement!</p>";
    }

    if ($rules[1] === 'false') {
        echo "<p id='error'>This password doesn't contain uppercase!</p>";
    } else {
        echo "<p id='none'>This password contains uppercase!</p>";
    }

    if ($rules[2] === 'false') {
        echo "<p id='error'>This password doesn't contain lowercase!</p>";
    } else {
        echo "<p id='none'>This password contains lowercase!</p>";
    }

    if ($rules[3] === 'false') {
        echo "<p id='error'>This password doesn't contain a number!</p>";
    } else {
        echo "<p id='none'>This password contains a number!</p>";
    }

    if ($rules[4] === 'false') {
        echo "<p id='error'>This password doesn't contain special characters!</p>";
    } else {
        echo "<p id='none'>This password contains special characters!</p>";
    }

    if ($rules[5] === 'false') {
        echo "<p id='error'>This password contains the word password!</p>";
    } else {
        echo "<p id='none'>This password does not contain the word password!</p>";
    }

    if ($rules[6] === 'false') {
        echo "<p id='error'>This password has a special character at the start!</p>";
    } else {
        echo "<p id='none'>This password does not have a special character at the start!</p>";
    }

    if ($rules[7] === 'false') {
        echo "<p id='error'>This password has a special character at the end!</p>";
    } else {
        echo "<p id='none'>This password does not have a special character at the end!</p>";
    }

    if ($rules[8] === 'false') {
        echo "<p id='error'>This password has a number at the end!</p>";
    } else {
        echo "<p id='none'>This password does not have a number at the end!</p>";
    }
    if($rules[9] === 9){
        $msg = "<p id = 'none'>Password: ".$password."</p>";
        echo $msg;
    } else {
        $msg = "<p id = 'error'>Password: " . $password . "</p>";
        echo $msg;
    }
}