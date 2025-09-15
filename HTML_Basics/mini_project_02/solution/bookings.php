<?php // opens php code section
echo"<!DOCTYPE html>";
echo"<html>";
echo"<head>";

echo"<title>Title</title>";
echo"<link rel='stylesheet' href='CSS/styles.css'>";

echo"</head>";

echo"<body>";
echo"<div class = 'container'>";
require_once "assets/topbar.php";
require_once "assets/nav.php";
echo"<div class = 'content'>";
echo "<table>";          // Opens a table to layout navigation buttons
echo "<tr>";
echo "<td>Course </td>";
echo "<td>Date </td>";
echo "<td>Tutor </td>";
echo "</tr>";
echo "<td>Example Course </td>";
echo "<td>Example Date </td>";
echo "<td>Example Tutor </td>";
echo "</tr>";
echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";

