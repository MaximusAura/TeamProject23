<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Movies</title>
</head>
<body>
    <h1>Movies</h1>
    <script id="replace_with_navbar" src="Nav.js"></script>
    <?php

    // specify the database credentials
    $host = "localhost";
    $username = "root";
    $password = "password";
    $dbname = "cinema";

    // create a connection to the database
    $conn = mysqli_connect($host, $username, $password, $dbname);

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // prepare and execute SQL statement
    $sql = "SELECT * FROM movie";
    $result = $conn->query($sql);

    // output data of each row
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class ='screenings'>";
            echo "Movie: " . $row["Title"] . "<br>";
            echo "Genre: " . $row["Genre"] . "<br>";
            echo "Duration: " . $row["Duration"] . "<br>";
            echo "Rating: " . $row["Rating"] . "<br>";
            //echo "TicketsSold: " . $row["TicketsSold"] . "<br>" . 
            echo "</div>";
            // add more fields as needed
            echo "<br>";
        }
    } else {
        echo "0 results";
    }

    $conn->close();

    ?>
    <script id="replace_with_footer" src="foot.js"></script>
</body>
</html>