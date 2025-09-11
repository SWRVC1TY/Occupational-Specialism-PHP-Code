<?php // Opens the PHP block

// Start of the HTML document
echo "<!DOCTYPE html>";
echo "<html>";

// ---------- HEAD SECTION ----------
echo "<head>";
echo "<title>Decepticons</title>"; // Browser tab title
echo "<link rel='stylesheet' href='CSS/styles.css'>"; // Link to external CSS stylesheet
echo "</head>";

// ---------- BODY SECTION ----------
echo "<body>";

// Site logo at the top of the page
echo "<img id='formerslogo' src='Images/formerslogo.webp' alt='Transformers Logo' />";
echo "<br>"; // Line break for spacing

// ---------- NAVIGATION ----------
echo "<nav>";
echo "<td><button class='b'><a href='index.php'>Home</a></button></td>"; // Home navigation button
echo "</nav>";
echo "<br>"; // Extra space between nav and content

// ---------- CHARACTER PROFILES ----------

// Megatron
echo "<img src='Images/megatron.png' alt='Megatron' />";
echo "<p class='header'>Megatron:</p>";
echo "<p class='content'>Role: Decepticon Leader</p>";
echo "<p class='content'>Description: The ruthless and cunning leader of the Decepticons, Megatron is determined to destroy the Autobots and rule Cybertron. He is gravely wounded in the opening battle and is reformatted into Galvatron by Unicron. His transformation into Galvatron marks a key shift in the Decepticon leadership.</p>";
echo "<br><br>";

// Starscream
echo "<img src='Images/starscream.png' alt='Starscream' />";
echo "<p class='header'>Starscream</p>";
echo "<p class='content'>Role: Decepticon Air Commander</p>";
echo "<p class='content'>Description: Starscream is the treacherous and ambitious second-in-command of the Decepticons, constantly scheming to overthrow Megatron and take control for himself. While he’s not the leader in the movie, his attempts to seize power during Megatron’s weakened state lead to his eventual downfall when he challenges Galvatron.</p>";
echo "<br><br>";

// Soundwave
echo "<img src='Images/soundwave.png' alt='Soundwave' />";
echo "<p class='header'>Soundwave</p>";
echo "<p class='content'>Role: Decepticon Communications Officer</p>";
echo "<p class='content'>Description: Soundwave is a loyal, cold, and efficient officer within the Decepticon ranks. His minions—like Ravage, Laserbeak, and Rumble—are deployed to carry out espionage, sabotage, and attacks. While he doesn’t have a prominent role in the film, his presence as a loyal lieutenant is essential to the Decepticon forces.</p>";
echo "<br><br>";

// Shockwave
echo "<img src='Images/shockwave.png' alt='Shockwave' />";
echo "<p class='header'>Shockwave</p>";
echo "<p class='content'>Role: Decepticon Scientist</p>";
echo "<p class='content'>Description: Shockwave is the cold, logical Decepticon scientist who is tasked with overseeing Cybertron’s defenses while Megatron is absent. Though he doesn't play a large role in The Movie, his character's ruthless logic and cold demeanor make him an essential part of the Decepticon hierarchy.</p>";
echo "<br><br>";

// Devastator
echo "<img src='Images/devastator.png' alt='Devastator' />";
echo "<p class='header'>Devastator</p>";
echo "<p class='content'>Role: Decepticon Combiner</p>"; // Fixed incorrect role from "Scientist"
echo "<p class='content'>Description: Devastator is a massive combiner formed from the six Constructicons (Scrapper, Hook, Long Haul, Bonecrusher, Mixmaster, and Scavenger). He is a force of destruction, and his appearance in the film is a testament to the sheer power of the Decepticons when they work together.</p>";

// ---------- END ----------
echo "</body>";
echo "</html>";
?>
