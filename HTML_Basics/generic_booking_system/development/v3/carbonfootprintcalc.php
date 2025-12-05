<?php
require_once "assets/common.php";
// opens php code section
if (!isset($_GET['message'])) {
    session_start();
    $message = false;
} else {
    $message = htmlspecialchars($_GET['message']);
} // opens our connection to the session
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $total = calculateCarbonFootprint();
}
echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";

echo "<title>Carbon Footprint Calculator</title>";
echo "<link rel='stylesheet' href='css/styles.css'>";

echo "</head>";

echo "<body>";
echo "<div class = 'container'>";
require_once "assets/top_bar.php";
require_once "assets/nav.php";

echo "<div class = 'content'>";
echo '<form action="" method="post">';
echo '    <label>Annual Electricity (kWh):</label>';
echo '    <input type="number" name="electricity_kwh" required><br>';

echo '    <label>Natural Gas (therms):</label>';
echo '    <input type="number" name="natural_gas_therms" required><br>';

echo '    <label>Vehicle Travel (km):</label>';
echo '    <input type="number" name="vehicle_km" required><br>';

echo '    <label>Fuel Efficiency (km per liter):</label>';
echo '    <input type="number" step="0.1" name="vehicle_efficiency" required><br>';

echo '    <label>Short Flights per Year:</label>';
echo '    <input type="number" name="short_flights" required><br>';

echo '    <label>Long Flights per Year:</label>';
echo '    <input type="number" name="long_flights" required><br>';

echo '    <button type="submit">Calculate</button>';

echo '</form>';
if (isset($total)){
    echo "Your emissions per year are: ".(string)round($total, 2) . " Kilo Tonnes CO₂e"."<br>";
    echo "Create an account <a href='index.php'>here</a> or log in <a href='index.php'>here</a> to book a consultation and help reduce your carbon footprint.<br>";
}
echo usr_msg();

echo "</div>";
echo "</div>";

echo "</body>";
echo "</html>";