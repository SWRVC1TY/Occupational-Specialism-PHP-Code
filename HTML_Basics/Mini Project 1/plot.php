<?php // opens php code section
echo"<!DOCTYPE html>";
echo"<html>";
echo"<head>";
echo"<title>Title</title>";
echo"<link rel='stylesheet' href='CSS/styles.css'>";
echo"</head>";
echo"<body>";
echo "<img id='formerslogo' src='images/formerslogo.webp' alt='Transformers Logo' />";  #sets a logo up for the top of each page
echo "<br>";  # line break for clarity and easy of reading.

echo "<table>";  #table used to help with layout of my hyperlinks
echo "<tr>";  # opens the table row (tr)
echo "<td> <a href='characters.php'>Characters</a></td>"; #open a cell for a link to be housed
echo "<td> <a href='media.php'>Media</a></td>";
echo "<td> <a href='mail.php'>Mail List</a></td>";
echo "<td> <a href='index.php'>Home</a></td>";
echo "</tr>";  # closes the row of the table.
echo "</table>";
echo"</body>";
echo"</html>";
?>
