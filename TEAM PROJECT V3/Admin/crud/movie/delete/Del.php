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

// // retrieve the ID of the record to be deleted
// $MovieID = $_POST['movieID'];

// // create an SQL query to delete the record
// $sql = "DELETE FROM movie WHERE MovieID = '$MovieID'";

// // execute the query and check for errors
// if (mysqli_query($conn, $sql)) {
//     echo "<script>alert('Entry Deleted!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
//     exit();
// } else {
//     echo "<script>alert('Error Deleting!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
// }

// // close the database connection
// mysqli_close($conn);
if (isset($_POST['Delete']) && isset($_POST['movieID'])) {
    $MovieID = $_POST['movieID'];
    $sql = "SELECT * FROM movie WHERE MovieID = '$MovieID'";
    $result = mysqli_query($conn, $sql);
  
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_assoc($result);
      // Display row data and confirmation message
      echo "<div class ='screenings'>" . "Are you sure you want to delete this row?<br>";
      echo "movieID: " . $row['MovieID'] . "<br>";
      echo "Title: " . $row['Title'] . "<br>";
      echo "genre: " . $row['Genre'] . "<br>";
      echo "rating: " . $row['Rating'] . "<br>";
      echo "duration: " . $row['Duration'] . "<br>";
      echo "<form method='post'>";
      echo "<input type='hidden' name='id' value='" . $row['MovieID'] . "'>";
      echo "<input type='submit' name='confirm' value='Yes'>";
      echo "<input type='submit' name='cancel' value='No'>";
      echo "</form>" . "</div>";
    } else {
      echo "Row not found";
    }
  } elseif (isset($_POST['confirm']) && isset($_POST['id'])) {
    $MovieID = $_POST['movieID'];
    $sql = "DELETE FROM movie WHERE MovieID = $MovieID";
    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Row deleted successfully!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
  } elseif (isset($_POST['cancel'])) {
    echo "<script>alert('Deletion canceled!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
  }
  
  // Close database connection
  mysqli_close($conn);
?>