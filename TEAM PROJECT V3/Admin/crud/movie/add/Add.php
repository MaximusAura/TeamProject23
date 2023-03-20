<link rel="stylesheet" href="style.css">
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

if (isset($_POST['Submit'])) {
    // $MovieID = $_POST['MovieID'];
    $Title = $_POST['Title'];
    $Genre = $_POST['Genre'];
    $Rating = $_POST['Rating'];
    // $Poster = $_POST['poster'];
    $Duration = $_POST['Duration'];
  
    // Display preview of new row
    echo "<div class ='screenings'>" . "Are you sure you want to add this row?<br>";
    // echo "MovieID: " . $MovieID . "<br>";
    echo "Title: " . $Title . "<br>";
    echo "Genre: " . $Genre . "<br>";
    echo "Rating: " . $Rating . "<br>";
    echo "Duration: " . $Duration . "<br>";
    echo "<form method='post'>";
    // echo "<input type='hidden' name='MovieID' value='" . $MovieID . "'>";
    echo "<input type='hidden' name='Title' value='" . $Title . "'>";
    echo "<input type='hidden' name='Genre' value='" . $Genre . "'>";
    echo "<input type='hidden' name='Rating' value='" . $Rating . "'>";
    echo "<input type='hidden' name='Duration' value='" . $Duration . "'>";
    echo "<input type='submit' name='confirm' value='Yes'>";
    echo "<input type='submit' name='cancel' value='No'>";
    echo "</form>" . "</div>";
  } elseif (isset($_POST['confirm'])) {
    // $MovieID = $_POST['MovieID'];
    $Title = $_POST['Title'];
    $Genre = $_POST['Genre'];
    $Rating = $_POST['Rating'];
    // $Poster = $_POST['poster'];
    $Duration = $_POST['Duration'];
  
    // Insert new row into database
    $sql = "INSERT INTO movie (Title, Genre, Rating, Duration)
    VALUES ('$Title', '$Genre', '$Rating', '$Duration')";

    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Row added successfully!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
  } elseif (isset($_POST['cancel'])) {
    echo "Insertion canceled";
    echo "<script>alert('Insertion canceled!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
  }
  
  // Close database connection
  mysqli_close($conn);
?>