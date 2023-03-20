<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Movie Details</title>
</head>
<body>
    <?php

    // check if the "id" query parameter is set
    if (isset($_GET["id"])) {
        // get the movie ID from the query parameter
        $MovieID = $_GET["id"];

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
        $sql = "SELECT * FROM movie WHERE MovieID = $MovieID";
        $result = $conn->query($sql);

        // output data of the selected row
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h1>" . $row["Title"] . "</h1>";
            echo "Genre: " . $row["Genre"] . "<br>";
            echo "Duration: " . $row["Duration"] . "<br>";
            echo "Rating: " . $row["Rating"] . "<br>";
            echo "<h2>Trailer</h2>";
            echo "<iframe width=\"560\" height=\"315\" src=\"" . $row["TrailerLink"] . "\" frameborder=\"0\" allowfullscreen></iframe>";
            // echo "<p><strong>Description:</strong> " . $row["Description"] . "</p>";
            // add more fields as needed
            // check if the "trailer" field is set
    
        } else {
            echo "No movie found with ID " . $movie_id;
        }

        $conn->close();
    } else {
        echo "No movie ID specified";
    }

    ?>
    <a href="Movies.php">Back to Movies</a>
</body>
</html>