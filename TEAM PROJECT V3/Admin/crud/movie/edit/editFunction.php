<?php
// specify the database credentials
$host = "localhost";
$username = "root";
$password = "password";
$dbname = "cinema";

// create a connection to the database
$conn = mysqli_connect($host, $username, $password, $dbname);

// check for errors in the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values from form
    $MovieID = $_POST['MovieID'];
    $Title = $_POST['Title'];
    $Genre = $_POST['genre'];
    $Rating = $_POST['rating'];
    // $Poster = $_POST['poster'];
    $Duration = $_POST['duration'];

    // Update data in database
    $sql = "UPDATE movie
    SET Title='$Title',
        Genre='$Genre',
        Rating='$Rating',
        Duration='$Duration'
        WHERE MovieID='$MovieID'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Get id parameter from URL
$MovieID = $_POST['id'];

// Select data for specific row
$sql = "SELECT MovieID,Title,Genre,Rating,Duration FROM movie WHERE id= '$MovieID'";
$result = $conn->query($sql);

// Display data in a form
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h1>Edit User</h1>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='MovieID' value='" . $row["MovieID"] . "'>";
    echo "<label>Title:</label><input type='text' name='Title' value='" . $row["Title"] . "'><br>";
    echo "<label>Genre:</label><input type='text' name='Genre' value='" . $row["Genre"] . "'><br>";
    echo "<label>Rating:</label><input type='text' name='Rating' value='" . $row["Rating"] . "'><br>";
    echo "<label>Duration:</label><input type='text' name='Duration' value='" . $row["Duration"] . "'><br>";
    echo "<input type='submit' value='Save'>";
    echo "</form>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>