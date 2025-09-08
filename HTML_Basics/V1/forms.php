<?php // opens php code section
echo"<!DOCTYPE html>";
echo"<html>";
echo"<head>";
echo"<title>Forms</title>";
echo"<link rel='stylesheet' href='CSS/styles.css'>";
echo"</head>";

echo"<body>";
echo "<form method='POST' action=''>";
echo"<label id='num' for='num'>No of tickets: </label>";
echo"<input type='number' name='num' id = 'num' placeholder='Number of Tickets' min='1' Required>";
echo"<br></br>";
echo"<label id='date' for='date'> Date: </label>";
echo"<input type='date' name='date' id = 'date' placeholder='Date' required>";
echo"<br></br>";
echo"<label id='email' for='email'> Email: </label>";
echo"<input type='email' name='email' id = 'email' placeholder='Email' required>";
echo"<br></br>";
echo"<label id='male' for='male'> Male: </label>";
echo"<input type='radio' name='gender' id = 'male' value='Male'>";
echo"<label id='female' for='female'> Female: </label>";
echo"<input type='radio' name='gender' id = 'female' value='Male'>";
echo"<br></br>";
echo"<label id='pass' for='pass'>Password: </label>";
echo"<input type='password' name='password' id='pass' placeholder='Password' Required>";
echo"<br></br>";
echo"<input id = submit type='submit' name='submit' value='Submit'>";
echo"</form>";

echo"</body>";
echo"</html>";
?>