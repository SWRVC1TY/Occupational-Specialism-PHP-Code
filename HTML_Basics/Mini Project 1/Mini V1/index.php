<?php // Opens the PHP code block

// Output the basic HTML structure using echo statements

echo "<!DOCTYPE html>";  // Defines the document type as HTML5
echo "<html>";           // Opens the HTML document

// ----- Head Section -----
echo "<head>";           // Opens the head section of the HTML

echo "<title>Mini Project 01</title>";  // Sets the title displayed in the browser tab
echo "<link rel='stylesheet' type='text/css' href='CSS/styles.css' />";  // Links an external CSS file for styling

echo "</head>";          // Closes the head section

// ----- Body Section -----
echo "<body>";           // Opens the body where main content will be displayed

echo "<div class='content'>";  // Opens a div with class 'content' for wrapping main content

// Logo Image
echo "<img id='formerslogo' src='images/formerslogo.webp' alt='Transformers Logo' />";  // Displays the Transformers logo image

echo "<br>";             // Adds a line break for spacing

// Navigation Section
echo "<nav>";            // Opens navigation block
echo "<table>";          // Opens a table to layout navigation buttons
echo "<tr>";             // Starts a table row

// Navigation Buttons (each in a table cell)
echo "<td><button class='b'><a href='characters.php'>Characters</a></button></td>"; // Link to Characters page
echo "<td><button class='b'><a href='plot.php'>Plot</a></button></td>";             // Link to Plot page
echo "<td><button class='b'><a href='media.php'>Media</a></button></td>";           // Link to Media page
echo "<td><button class='b'><a href='mail.php'>Mail List</a></button></td>";        // Link to Mail List page

echo "</tr>";            // Closes the table row
echo "</table>";         // Closes the table
echo "</nav>";           // Closes the navigation block

echo "</div>";           // Closes the main content div

echo "<br>";             // Adds another line break for spacing

// ----- Main Content -----

// Heading
echo "<h2>Welcome to my Transformers Mini Project Website</h2>";  // Displays a welcome heading

// Paragraphs
echo "<p class='content'>The Transformers film is a 1980s animated feature-length movie based on the TV show of the same name. The movie screened in cinemas from 12th December 1986 in the UK.</p>";

echo "<p class='content'>The movie, with its powerful 80s rock soundtrack, follows the exploits of HotRod and the rest of the Autobots against the newly formed Galvatron and the Decepticons.</p>";

// ----- Closing Tags -----
echo "</body>";          // Closes the body
echo "</html>";          // Closes the HTML document

?>