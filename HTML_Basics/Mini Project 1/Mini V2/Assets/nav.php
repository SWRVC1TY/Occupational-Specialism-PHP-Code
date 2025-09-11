<?php
// Navigation Section
echo "<div id = 'nav'>";            // Opens navigation block
echo "<table>";          // Opens a table to layout navigation buttons
echo "<tr>";             // Starts a table row

// Navigation Buttons (each in a table cell)
echo "<td><button><a href='characters.php'>Characters</a></button></td>"; // Link to Characters page
echo "<td><button><a href='plot.php'>Plot</a></button></td>";             // Link to Plot page
echo "<td><button><a href='media.php'>Media</a></button></td>";           // Link to Media page
echo "<td><button><a href='mail.php'>Mail List</a></button></td>";        // Link to Mail List page
echo "<td><button><a href='index.php'>Home</a></button></td>";        // Link to Home List page

echo "</tr>";            // Closes the table row
echo "</table>";         // Closes the table
echo "</div>";           // Closes the navigation block