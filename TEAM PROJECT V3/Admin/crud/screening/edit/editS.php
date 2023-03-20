<link rel="stylesheet" href="style.css">
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Edit Screening</title>
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
        $ScreeningID = $_POST['ScreeningID'];
        $MovieTitle = $_POST['MovieTitle'];
        $ScrenNo = $_POST['ScrenNo'];
        $Date = $_POST['Date'];
        $Time = $_POST['Time'];

        // create an SQL query to edit the data in the movies table
        $sql = "UPDATE screening
            SET MovieTitle='$MovieTitle',
                ScrenNo='$ScrenNo',
                Date='$Date',
                Time='$Time'
                WHERE ScreeningID='$ScreeningID'";

        // execute the query and check for errors
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Entry Updated!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
            exit();
        } else {
            echo "<script>alert('Error Editing!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
        }
    }

    // create an SQL query to retrieve the data from the movies table
    $sql = "SELECT * FROM screening";

    // execute the query and get the result set
    $result = mysqli_query($conn, $sql);

    // output the data in a table
    echo "<table>";
    echo "<tr><th>ScreeningID</th><th>MovieTitle</th><th>ScreenNo</th><th>Date</th><th>Time</th><th>Action</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<form action='' method='POST'>";
        echo "<input type='hidden' name='ScreeningID' value='" . $row["ScreeningID"] . "'>";
        echo "<td>" . $row["ScreeningID"] . "</td>";
        echo "<td><input type='text' name='MovieTitle' value='" . $row["MovieTitle"] . "'></td>";
        echo "<td><input type='text' name='ScrenNo' value='" . $row["ScrenNo"] . "'></td>";
        echo "<td><input type='text' name='Date' value='" . $row["Date"] . "'></td>";
        echo "<td><input type='text' name='Time' value='" . $row["Time"] . "'></td>";
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