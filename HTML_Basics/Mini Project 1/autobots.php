<?php // Opens the PHP code block

// Output the basic HTML structure
echo "<!DOCTYPE html>";  // Define document type
echo "<html>";           // Open HTML document

// ----- HEAD SECTION -----
echo "<head>";           // Open head tag
echo "<title>AutoBots</title>";  // Set the page title
echo "<link rel='stylesheet' href='CSS/styles.css'>"; // Link to external CSS file
echo "</head>";          // Close head tag

// ----- BODY SECTION -----
echo "<body>";           // Open body tag

// ----- HEADER IMAGE -----
echo "<img id='formerslogo' src='Images/formerslogo.webp' alt='Transformers Logo' />";  // Display logo at top
echo "<br>";  // Line break for spacing

// ----- NAVIGATION -----
echo "<nav>";  // Open navigation section
echo "<td><button><a href='index.php'>Home</a></button></td>";  // Navigation link back to homepage
echo "</nav>";
echo "<br>";  // Spacing

// ----- AUTOBOT PROFILES -----

// Optimus Prime
echo "<img class='autobot' src='Images/optimus.png' alt='Optimus Prime' />";
echo "<p class='header'>Optimus Prime (Autobot):</p>";
echo "<p class='content'>Role: Leader of the Autobots</p>";
echo "<p class='content'>Description: The noble leader of the Autobots, Optimus Prime is a beacon of courage and justice. He sacrifices himself to protect the Autobots and the future of Cybertron in an epic battle against Megatron. Before his death, he passes the Matrix of Leadership to Hot Rod, signaling the new leader of the Autobots.</p>";

echo "<br><br>";  // Spacing between characters

// Hot Rod / Rodimus Prime
echo "<img class='autobot' src='Images/hot%20rod.png' alt='Hot Rod' />";
echo "<p class='header'>Hot Rod / Rodimus Prime:</p>";
echo "<p class='content'>Role: Autobot Warrior / Leader</p>";
echo "<p class='content'>Description: Initially a young, hot-headed Autobot, Hot Rod undergoes a transformation into Rodimus Prime after Optimus Prime's death. He inherits the Matrix of Leadership and becomes the new Autobot leader. Hot Rod’s journey from a reckless warrior to a wise and mature leader is central to the film’s story.</p>";

echo "<br><br>";

// Bumblebee
echo "<img class='autobot' src='Images/bumblebee.png' alt='Bumblebee' />";
echo "<p class='header'>Bumblebee:</p>";
echo "<p class='content'>Role: Autobot Scout</p>";
echo "<p class='content'>Description: Bumblebee is a loyal, brave Autobot and one of the fan favorites. He’s a smaller, more relatable figure among the Autobots, often acting as a bridge between the Autobots and the human characters in the film. He also helps guide the humans during their involvement with the Autobots.</p>";

echo "<br><br>";

// Jazz
echo "<img class='autobot' src='Images/jazz.png' alt='Jazz' />";
echo "<p class='header'>Jazz:</p>";
echo "<p class='content'>Role: Special Operations Officer</p>";
echo "<p class='content'>Description: Jazz is the Autobots' cool, music-loving, and smooth-talking operations officer. He’s always ready to jump into action and brings a sense of style and humor to the team. He serves alongside Optimus Prime but plays a more supporting role in the movie after Prime’s death.</p>";

echo "<br><br>";

// Ironhide
echo "<img class='autobot' src='Images/ironhide.png' alt='Ironhide' />";
echo "<p class='header'>Ironhide:</p>";
echo "<p class='content'>Role: Autobot Security Chief</p>";
echo "<p class='content'>Description: Ironhide is the tough, no-nonsense warrior who serves as the Autobots’ security chief. He's one of Optimus Prime’s closest allies and is tough on the battlefield. He meets his end early in the movie, providing a powerful moment that highlights the stakes of the war.</p>";

echo "<br><br>";

// Wheeljack
echo "<img class='autobot' src='Images/wheeljack.png' alt='Wheeljack' />";
echo "<p class='header'>Wheeljack:</p>";
echo "<p class='content'>Role: Autobot Engineer</p>";
echo "<p class='content'>Description: Wheeljack is a brilliant inventor and mechanic. While not as prominent in the film as some others, his contributions are vital. He’s known for his experimentation and engineering, often creating gadgets to assist the Autobots in battle.</p>";

echo "<br><br>";

// Ultra Magnus
echo "<img class='autobot' src='Images/Ultra%20magnus.png' alt='Ultra Magnus' />";
echo "<p class='header'>Ultra Magnus:</p>";
echo "<p class='content'>Role: Autobot Warrior / Second-in-command</p>";
echo "<p class='content'>Description: Ultra Magnus is a loyal and dedicated Autobot warrior, who reluctantly takes on the role of Autobot leader after Optimus Prime’s death. His leadership is tested throughout the film, and he serves as a strong, dependable figure who helps guide the Autobots through the battle against the Decepticons.</p>";

echo "<br><br>";

// Arcee
echo "<img class='autobot' src='Images/arcee.png' alt='Arcee' />";
echo "<p class='header'>Arcee:</p>";
echo "<p class='content'>Role: Autobot Warrior</p>";
echo "<p class='content'>Description: Arcee is one of the few female Autobots in the movie, and while her role is not as prominent as some of the others, she is an important character. She is a fierce fighter and a protector of the Autobot cause, especially in the later stages of the film.</p>";

echo "<br><br>";

// Grimlock
echo "<img class='autobot' src='Images/grimlock.png' alt='Grimlock' />";
echo "<p class='header'>Grimlock:</p>";
echo "<p class='content'>Role: Leader of the Dinobots</p>";
echo "<p class='content'>Description: Grimlock is the powerful and often unpredictable leader of the Dinobots, a group of Autobots that transform into prehistoric creatures. Grimlock himself transforms into a massive mechanical Tyrannosaurus rex. Though he is less intellectually inclined than some other Autobots, his raw strength and ability to wreak havoc in battle make him a formidable force. Despite his sometimes stubborn and rebellious nature, Grimlock is loyal to Optimus Prime and the Autobot cause.</p>";

echo "<br><br>";

// Prowl
echo "<img class='autobot' src='Images/prowl.png' alt='Prowl' />";
echo "<p class='header'>Prowl:</p>";
echo "<p class='content'>Role: Autobot Military Strategist and Law Enforcement Officer</p>";
echo "<p class='content'>Description: Prowl is an Autobot who serves as a military strategist and enforcer of Autobot law. He is a logical, disciplined, and somewhat stern character, dedicated to ensuring that the Autobots operate according to a strict code of conduct. Prowl transforms into a police car, which reflects his role as a law-keeper among the Autobots. His tactical mind is invaluable in the battle against the Decepticons, though his rigid sense of order sometimes leads to conflicts with more free-spirited Autobots like Bumblebee and Hot Rod.</p>";

// Close the body and HTML
echo "</body>";
echo "</html>";
?>