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
echo "<br>";

echo "<h2> Choose a side....";  # sets a h2 heading as a welcome
echo "</h2>";
echo "<button class = 'autobots'><a href='autobots.php'><img class = images src = 'Images/autobots.png'></a></buttonautobots>";
echo "<button class = 'decepticons'><a href='decepticons.php'><img class = images src = 'Images/decepticons.png'></a></button>";

echo "</div>";
echo "</div>";
echo"</body>";
echo "</html>";
?>