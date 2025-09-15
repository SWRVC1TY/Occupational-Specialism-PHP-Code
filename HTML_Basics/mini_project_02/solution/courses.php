<?php
echo"<!DOCTYPE html>";
echo"<html>";
echo"<head>";

echo"<title>Title</title>";
echo"<link rel='stylesheet' href='css/styles.css'>";

echo"</head>";

echo"<body>";
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

echo "<div class = 'container'>";
    require_once "assets/topbar.php";
    require_once "assets/nav.php";
    echo"<br>";
    echo"<div class = content>";
echo "<h2>These are the GCSE Courses we have to offer!</h2>";
echo "<br>";
echo "<select name='GCSE Course' id='freq'>";
foreach ($gcseCourses as $course) { // displays all coursesing in a for loop
    echo "<option value='$course'>$course</option>";
}
echo "</select>";
echo"</div>";
echo"</div>";

echo"</body>";
echo"</html>";
