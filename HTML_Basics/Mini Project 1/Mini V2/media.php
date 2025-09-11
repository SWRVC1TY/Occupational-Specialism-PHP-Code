<?php // This open the php code section

echo "<!DOCTYPE html>";  # essential html line to dictate the page type

echo "<html>";  # opens the html content of the page

echo "<head>";  # opens the head section

echo "<title> Mini Project 01</title>";  # sets the title of the page (web browser tab)
echo "<link rel='stylesheet' type='text/css' href='css/styles.css' />";  # links to the external style sheet

echo "</head>";  # closes the head section of the page

echo "<body>";  # opens the body for the main content of the page.

echo "<div class='container'>";  // Opens a div with class 'content' for wrapping main content
require_once "Assets/topbar.php";
require_once "Assets/nav.php";
// ----- Main Content -----

echo "<div class='content'>";

echo "<h2> Media from The Transformers Movie:</h2>";  # sets a h2 heading as a welcome
echo "<table>";
echo "<td><p class = content>Download movie script: </p></td>";
echo "<td><button class = download><a href='Resources/Script.txt' download='Resources/Script.txt'><img src = 'Images/download.png' height='25' width='25'></a></button></td>"; # Download for script
echo "</div>";
echo "</div>";
echo "</body>";


echo "</html>";
?>