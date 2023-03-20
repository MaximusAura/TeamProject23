<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
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
    <link rel="stylesheet" href="style.css">
    <title>Delete Movie</title>
</head>

<body>
    <h1>Delete Movie</h1>
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
    $sql = "SELECT * FROM movie";
    $result = mysqli_query($conn, $sql);

    // Check if there are any rows in the result set
    if (mysqli_num_rows($result) > 0) {
        // Display table headers
        echo "<table>";
        echo "<tr><th>MovieID</th><th>Title</th><th>Genre</th><th>Rating</th><th>Duration</th></tr>";

        // Loop through result set and display table rows
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['MovieID'] . "</td>";
            echo "<td>" . $row['Title'] . "</td>";
            echo "<td>" . $row['Genre'] . "</td>";
            echo "<td>" . $row['Rating'] . "</td>";
            echo "<td>" . $row['Duration'] . "</td>";
            echo "<td><form method='post'><input type='hidden' name='MovieID' value='" . $row['MovieID'] . "'><input type='submit' name='delete' value='Delete'></form></td>";
            echo "</tr>";
        }

        // Display table footer
        echo "</table>";
    } else {
        echo "No rows found";
    }

    // Check if delete button was clicked
    if (isset($_POST['delete'])) {
        $MovieID = $_POST['MovieID'];

        // Delete row from database
        $sql = "DELETE FROM movie WHERE MovieID = '$MovieID'";
        $result = mysqli_query($conn, $sql);

        // Check if delete was successful
        if ($result) {
            echo "Row deleted successfully";
        } else {
            echo "Error deleting row: " . mysqli_error($conn);
        }
        // Reload the current page using PHP
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    // Close database connection
    mysqli_close($conn);
    ?>

</body>

</html>