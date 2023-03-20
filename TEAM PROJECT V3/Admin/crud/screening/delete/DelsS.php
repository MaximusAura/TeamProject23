<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
<style>
  table {
    border-collapse: collapse;
    width: 100%;
  }
  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  th {
    background-color: #f2f2f2;
  }
  td button {
    background-color: #ff0000;
    color: #fff;
    border: none;
    padding: 6px 12px;
    border-radius: 4px;
    cursor: pointer;
  }
  td button:hover {
    background-color: #cc0000;
  }
</style>
  <title>Delete Screening</title>
</head>
<body>
<script id="replace_with_navbar" src="Nav2.js"></script>
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
// Retrieve data from database
$sql = "SELECT * FROM screening";
$result = mysqli_query($conn, $sql);

// Check if there are any rows in the result set
if (mysqli_num_rows($result) > 0) {
  // Display table headers
  echo "<table>";
  echo "<tr><th>ScreeningID</th><th>MovieTitle</th><th>ScreenNo</th><th>Date</th><th>Time</th></tr>";

  // Loop through result set and display table rows
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['ScreeningID'] . "</td>";
    echo "<td>" . $row['MovieTitle'] . "</td>";
    echo "<td>" . $row['ScrenNo'] . "</td>";
    echo "<td>" . $row['Date'] . "</td>";
    echo "<td>" . $row['Time'] . "</td>";
    echo "<td><form method='post'><input type='hidden' name='ScreeningID' value='" . $row['ScreeningID'] . "'><input type='submit' name='delete' value='Delete'></form></td>";
    echo "</tr>";
  }

  // Display table footer
  echo "</table>";
} else {
  echo "No rows found";
}

// Check if delete button was clicked
if (isset($_POST['delete'])) {
  $ScreeningID = $_POST['ScreeningID'];

  // Delete row from database
  $sql = "DELETE FROM screening WHERE ScreeningID = '$ScreeningID'";
  $result = mysqli_query($conn, $sql);

  // Check if delete was successful
  if ($result) {
    echo "Row deleted successfully";
  } else {
    echo "Error deleting row: " . mysqli_error($conn);
  }
    // Reload the current page using PHP
    header("Location: ".$_SERVER['PHP_SELF']);
    exit();
}

// Close database connection
mysqli_close($conn);
?>

</body>
</html>
