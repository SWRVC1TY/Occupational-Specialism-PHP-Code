<?php
// Navigation Section
echo "<div id = 'navi'>"; // Opens navigation block
echo "<nav>";
echo "<ul>";

// Navigation Buttons (each in a table cell)
echo "<li><a href='index.php'>Home</a></li>";   // Link to View Bookings page

if (!isset($_SESSION['userid'])){
    echo "<li><a href='login.php'>Login</a></li>";  // Link to page 1
    echo "<li><a href='register.php'>Register</a></li>";  // Link to page 2
}
else { // used if statement to show pages on log in status to remove attack vectors
    echo "<li><a href='bookin.php'>Book in</a></li>";  // Link to page 2
    echo "<li><a href='logout.php'>Logout</a></li>";
}
echo "</ul>";

echo"<nav>";
echo "</div>";