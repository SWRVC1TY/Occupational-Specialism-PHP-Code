<?php // Opens PHP block

// Begin outputting HTML document structure
echo "<!DOCTYPE html>"; // Define the document type
echo "<html>";
echo "<head>";
echo "<title>Mini Project 01</title>"; // Page title
echo "<link rel='stylesheet' type='text/css' href='css/styles.css' />"; // Link to external CSS
echo "</head>";

// ---------- FORM DATA PROCESSING ----------
$email = "";
$freq = "";
$data_received = false;

// Check if the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_received = true;
}

// Open the file for appending form submissions
$myfile = fopen("User Data/Mailing list.txt", "a");

// ---------- START BODY ----------
echo "<body>";

// Logo at the top
echo "<img id='formerslogo' src='images/formerslogo.webp' alt='Transformers Logo' />";
echo "<br>";

// ---------- NAVIGATION MENU ----------
echo "<nav>";
echo "<table>";
echo "<tr>";
echo "<td><button class='b'><a href='characters.php'>Characters</a></button></td>";
echo "<td><button class='b'><a href='plot.php'>Plot</a></button></td>";
echo "<td><button class='b'><a href='media.php'>Media</a></button></td>";
echo "<td><button class='b'><a href='index.php'>Home</a></button></td>";
echo "</tr>";
echo "</table>";
echo "</nav>";
echo "<br>";

// ---------- FORM HEADING ----------
echo "<h2>Sign up for the mailing list</h2>";
echo "<br>";

// ---------- MAILING LIST FORM ----------
echo"<div>";
echo "<form action='' method='POST'>";
echo "<label for='email' class = content>Email: </label>";
echo "<input type='email' name='email' id='email' placeholder='Email' required>";
echo "<br>";

echo "<label for='freq' class = content>Choose how often you want to receive promotional emails:</label>";
echo "<select name='period' id='freq'>";
echo "<option value='Weekly'>Weekly</option>";
echo "<option value='Bi-Weekly'>Bi-Weekly</option>";
echo "<option value='Monthly'>Monthly</option>";
echo "</select>";
echo "<br>";

echo "<input id='submit' type='submit' name='submits' value='Submit'>"; // Submit button
echo "</form>";
echo "<br>";
echo "</div>";
// ---------- DISPLAY CONFIRMATION & SAVE DATA ----------
if ($data_received === true) {
    $data = "Email: " . $_POST['email'] . ", Frequency: " . $_POST['period'];

    // Write the submitted data to the file
    fwrite($myfile, $data . PHP_EOL);
    fclose($myfile); // Always close the file when done

    // Display confirmation to user
    echo "<p class = content>✅ Welcome to the mailing list!</p><br>";
    echo "<p class = content>📧 Email entered: <strong>" . htmlspecialchars($_POST["email"]) . "</strong></p><br>";
    echo "<p class = content>🗓️ Frequency selected: <strong>" . htmlspecialchars($_POST["period"]) . "</strong></p><br>";
}

echo "</body>";
echo "</html>";
?>
