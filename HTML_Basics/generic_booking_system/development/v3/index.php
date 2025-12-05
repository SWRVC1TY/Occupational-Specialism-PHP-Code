<?php
require_once "assets/common.php";
// opens php code section
if (!isset($_GET['message'])) {
    session_start();
    $message = false;
} else {
    $message = htmlspecialchars($_GET['message']);
} // opens our connection to the session
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";

echo "<title>Home</title>";
echo "<link rel='stylesheet' href='css/styles.css'>";

echo "</head>";

echo "<body>";
echo "<div class = 'container'>";
require_once "assets/top_bar.php";
require_once "assets/nav.php";

echo "<div class = 'content'>";
echo"<h2>Welcome to Rolsa Technology</h2>";
echo"At Rolsa Technology, we drive the future of sustainability through smart, innovative green solutions. Our team is committed to creating clean-energy technologies that help businesses and communities reduce their environmental impact while boosting efficiency and long-term growth.

From renewable energy systems to eco-friendly infrastructure, we combine advanced engineering with a passion for the planet. Our goal is simple: deliver powerful, practical, and sustainable technologies that make a real difference.

Together, we’re building a cleaner, greener world — one innovation at a time.";
echo usr_msg();

echo "</div>";
echo "</div>";

echo "</body>";
echo "</html>";