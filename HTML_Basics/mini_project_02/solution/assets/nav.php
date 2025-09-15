<?php
// Navigation Section
echo "<div id = 'nav'>";            // Opens navigation block
echo "<table>";          // Opens a table to layout navigation buttons
echo "<tr>";             // Starts a table row

// Navigation Buttons (each in a table cell)
echo "<td><a href='bookings.php'>View Bookings</a></td>"; // Link to View Bookings page
echo "<td><a href='booking.php'>Book In</a></td>";             // Link to Book In page
echo "<td><a href='Courses.php'>Courses</a></td>";           // Link to Courses page
echo "<td><a href='index.php'>Home</a></td>";           // Link to home page

echo "</tr>";            // Closes the table row
echo "</table>";         // Closes the table
echo "</div>";           // Closes the navigation