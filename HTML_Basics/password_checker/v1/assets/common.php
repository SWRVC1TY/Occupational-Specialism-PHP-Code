<?php
function password_verification($password)
{
$rules = [];
    if(strlen($password)>=8)
        $rules[0] = 'true';// length is at least 8
    else
        $rules[0] = 'false';
    if(preg_match('/[A-Z]/',$password))
        $rules[1] = 'true';// found uppercase
    else
        $rules[1] = 'false';
    if(preg_match('/[a-z]/',$password))
        $rules[2] = 'true';// found lowercase
    else
        $rules[2] = 'false';
    if(preg_match('/[0-9]/',$password))
        $rules[3] = 'true';// found a number
    else
        $rules[3] = 'false';
    if(preg_match('/[^a-zA-Z0-9_]/',$password))
        $rules[4] = 'true';// found a letter that isn't a character
    else
        $rules[4] = 'false';
    if (!str_contains(strtolower($password), 'password'))
        $rules[5] = 'true';  // good password (doesn't contain "password")
    else
        $rules[5] = 'false'; // bad password

    return $rules;
}
function display_rules($rules){

}