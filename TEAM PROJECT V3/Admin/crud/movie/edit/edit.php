<link rel="stylesheet" href="style.css">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Movie</title>
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

// check if the form has been submitted
if (isset($_POST['submit'])) {
    // retrieve the form data from the $_POST superglobal array
    $MovieID = $_POST['MovieID'];
    $Title = $_POST['Title'];
    $Genre = $_POST['genre'];
    $Rating = $_POST['rating'];
    $Duration = $_POST['duration'];

    // create an SQL query to edit the data in the movies table
    $sql = "UPDATE movie
            SET Title='$Title',
                genre='$Genre',
                rating='$Rating',
                duration='$Duration'
                WHERE MovieID='$MovieID'";

    // execute the query and check for errors
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Entry Updated!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
        exit();
    } else {
        echo "<script>alert('Error Editing!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
    }
}

// create an SQL query to retrieve the data from the movies table
$sql = "SELECT * FROM movie";

// execute the query and get the result set
$result = mysqli_query($conn, $sql);

// output the data in a table
echo "<table>";
echo "<tr><th>Movie ID</th><th>Title</th><th>Genre</th><th>Rating</th><th>Duration</th><th>Action</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<form action='' method='POST'>";
    echo "<input type='hidden' name='MovieID' value='" . $row["MovieID"] . "'>";
    echo "<td>" . $row["MovieID"] . "</td>";
    echo "<td><input type='text' name='Title' value='" . $row["Title"] . "'></td>";
    echo "<td><input type='text' name='genre' value='" . $row["Genre"] . "'></td>";
    echo "<td><input type='text' name='rating' value='" . $row["Rating"] . "'></td>";
    echo "<td><input type='text' name='duration' value='" . $row["Duration"] . "'></td>";
    echo "<td><input type='submit' name='submit' value='Update'></td>";
    echo "</form>";
    echo "</tr>";
}
echo "</table>";

// close the database connection
mysqli_close($conn);
?>
</body>
</html>









