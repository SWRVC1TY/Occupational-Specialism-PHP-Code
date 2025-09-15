<?php // opens php code section
echo"<!DOCTYPE html>";
echo"<html>";
echo"<head>";

echo"<title>Title</title>";
echo"<link rel='stylesheet' href='CSS/styles.css'>"; // linking style sheet

echo"</head>";

echo"<body>";
echo"<div class = 'container'>";
$gcseCourses = [
    'English Language',
    'English Literature',
    'Mathematics',
    'Biology',
    'Chemistry',
    'Physics',
    'Combined Science',
    'History',
    'Geography',
    'Religious Studies',
    'French',
    'Spanish',
    'German',
    'Art and Design',
    'Design and Technology',
    'Computer Science',
    'Physical Education',
    'Music',
    'Drama',
    'Business Studies',
    'Economics',
    'Citizenship Studies',
    'Media Studies',
    'Sociology',
    'Psychology',
    'Food Preparation and Nutrition',
];

require_once "assets/topbar.php";
require_once "assets/nav.php";
echo "<div class = 'content'";
echo "<form action='' method='POST'>";
echo "<label for='email' class = content>Email: </label>";
echo "<input type='email' name='email' id='email' placeholder='Email' required>";
echo "<br>";
echo"<label id='num' for='num'>Time of Lesson: </label>"; // gets data from user
echo"<input type='text' name='text' id = 'time' placeholder='00:00' Required>";
echo"<br>";
echo"<label id='date' for='date'> Date: </label>";
echo"<input type='date' name='date' id = 'date' placeholder='Date' required>";
echo"<br>";
echo "<label for='freq' class = content>Choose a GCSE course:</label>";
echo "<select name='GCSE Course' id='freq'>";
foreach ($gcseCourses as $course) { // for loop to display all course
    echo "<option value='$course'>$course</option>";
}
echo "</select>";
echo "<br>";

echo "<input id='submit' type='submit' name='submits' value='Submit'>"; // Submit button
echo "</form>";
echo "<br>";
echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";
?>