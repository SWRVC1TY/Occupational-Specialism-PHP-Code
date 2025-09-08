<?php // opens php code section
echo"<!DOCTYPE html>";
echo"<html>";
echo"<head>";
    echo"<title>Forms</title>";
    echo"<link rel='stylesheet' href='CSS/styles.css'>";// linking style sheet to file
echo"</head>";

if ($_SERVER["REQUEST_METHOD"] == "POST") { // selection statment to see if any data has been sent to POST
    echo" Your number of tickets " . $_POST["num"] . "<br>"; // displays data from post
    echo" Your date chosen is " . $_POST["date"] . "<br>";
    echo" Your email is " . $_POST["email"] . "<br>";
    echo" Your gender is " . $_POST["gender"] . "<br>";
    echo" Your password is " . $_POST["password"] . "<br>";
    echo"<br>";
}

echo"<body>";
    echo "<form method='POST' action=''>"; // sends data to post
        echo"<label id='num' for='num'>No of tickets: </label>"; // gets data from user
        echo"<input type='number' name='num' id = 'num' placeholder='Number of Tickets' min='1' Required>";
        echo"<br>";
        echo"<label id='date' for='date'> Date: </label>";
        echo"<input type='date' name='date' id = 'date' placeholder='Date' required>";
        echo"<br>";
        echo"<label id='email' for='email'> Email: </label>";
        echo"<input type='email' name='email' id = 'email' placeholder='Email' required>";
        echo"<br>";
        echo"<label id='male' for='male'> Male: </label>";
        echo"<input type='radio' name='gender' id = 'male' value='Male'>";
        echo"<label id='female' for='female'> Female: </label>";
        echo"<input type='radio' name='gender' id = 'female' value='Male'>";
        echo"<br>";
        echo"<label id='pass' for='pass'>Password: </label>";
        echo"<input type='password' name='password' id='pass' placeholder='Password' Required>";
        echo"<br>";
        echo"<input id = submit type='submit' name='submit' value='Submit'>"; // submit button to submit data to post
    echo"</form>";

echo"</body>";
echo"</html>";
?>