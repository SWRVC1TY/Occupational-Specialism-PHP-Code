<?php // This open the php code section

echo "<!DOCTYPE html>";  # essential html line to dictate the page type

echo "<html>";  # opens the html content of the page

echo "<head>";  # opens the head section

echo "<title> Mini Project 01</title>";  # sets the title of the page (web browser tab)
echo "<link rel='stylesheet' type='text/css' href='css/styles.css' />";  # links to the external style sheet

echo "</head>";  # closes the head section of the page
$email = "";
$freq = "";
$data_received = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") { // selection statment to see if any data has been sent to POST
    $data_received = true;
}
$myfile = fopen("User Data/Mailing list.txt", "a");
echo "<body>";  # opens the body for the main content of the page.

echo "<img id='formerslogo' src='images/formerslogo.webp' alt='Transformers Logo' />";  #sets a logo up for the top of each page
echo "<br>";  # line break for clarity and easy of reading.

echo"<nav>";
echo "<table>";  #table used to help with layout of my hyperlinks
echo "<tr>";  # opens the table row (tr)
echo "<td><button class = 'b'><a href='characters.php'>Characters</a></button></td>"; #open a cell for a link to be housed
echo "<td><button class = 'b'><a href='plot.php'>Plot</a></button></td>";
echo "<td><button class = 'b'><a href='media.php'>Media</a></button></td>";
echo "<td><button class = 'b'><a href='index.php'>Home</a></button></td>";
echo "</tr>";  # closes the row of the table.
echo "</table>";  # closes the table off
echo"</nav>";
echo "<br>";

echo "<h2> Sign up for the mailing list";  # sets a h2 heading as a welcome


echo "</body>";
echo"<br>";
echo"<form action='' method='POST'>";
    echo"<label id='email' for='email'> Email: </label>";
    echo"<input type='email' name='email' id = 'email' placeholder='Email' required>";
    echo"<br>";
    echo"<label for='freq'>Choose how often you want to receive promotional emails:</label>";

    echo"<select name='period' id='freq'>";
    echo"<option value='Weekly'>Weekly</option>'";
    echo"<option value='Bi-Weekly'>Bi-Weekly</option>";
    echo"<option value='Monthly'>Monthly</option>";
echo"</select>";
    echo"<br>";
    echo"<input id = submit type='submit' name='submits' value='Submit'>"; // submit button to submit data to post
echo"</form>";
echo"<br>";
if ($data_received === true) {
    $data ="Email: ".$_POST['email'].", "."Frequency: ".$_POST['period'];
    fwrite($myfile, $data.PHP_EOL);
    fclose($myfile);
    echo "Welcome to the mailing list, the email that you have entered is:  " . $_POST["email"] . "<br>";
    echo "You have chosen to receive promotional emails:  " . $_POST["period"] . "<br>";

}
echo "</body>";
echo "</html>";