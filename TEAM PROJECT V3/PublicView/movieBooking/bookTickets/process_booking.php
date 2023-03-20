<?php
// Get the form data
$name = $_POST["name"];
$email = $_POST["email"];
$movie = $_POST["Movie"];
$screening = $_POST["Screening"];
$numTickets = $_POST["numTickets"];

// Create the message to display and save to file
$message = "Thank you for your booking!" . PHP_EOL .PHP_EOL .
           "Name: " . $name . PHP_EOL .
           "Email: " . $email . PHP_EOL .
           "Movie: " . $movie . PHP_EOL .
           "Screening: " . $screening . PHP_EOL .
           "Number of Tickets: " . $numTickets . PHP_EOL;

// Display the booking details
echo "<p><strong>" . $message . "</strong></p>";

// Save the booking details to a unique text file
$myPath = "./Tickets/";
$filename = $myPath."booking_" . uniqid() . ".txt";
$file = fopen($filename, "w") or die("Unable to open file!");
fwrite($file, $message);
fclose($file);
?>


