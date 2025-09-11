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
echo "<body>";   // Opens the body where main content will be displayed

echo "<div class='container'>";  // Opens a div with class 'content' for wrapping main content
require_once "Assets/topbar.php";
require_once "Assets/nav.php";
// ----- Main Content -----

echo "<div class='content'>";  // Opens a div with class 'content' for wrapping main content
// Heading
echo "<h2>Welcome to my Transformers Mini Project Website</h2>";  // Displays a welcome heading

// Paragraphs
echo "<p>The Transformers film is a 1980s animated feature-length movie based on the TV show of the same name. The movie screened in cinemas from 12th December 1986 in the UK.</p>";

echo "<p>The movie, with its powerful 80s rock soundtrack, follows the exploits of HotRod and the rest of the Autobots against the newly formed Galvatron and the Decepticons.</p>";

echo "</div>";
echo "</div>";
// ----- Closing Tags -----
echo "</body>";          // Closes the body

echo "</html>";          // Closes the HTML document
