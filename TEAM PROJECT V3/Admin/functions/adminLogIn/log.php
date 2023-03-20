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

// retrieve the form data from the $_POST superglobal array
    $email = $_POST['email'];
    $password = $_POST['password'];

// create an SQL query to insert the data into the movies table
$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

// execute the query and check for errors
if ($result->num_rows > 0) {
    echo "<script>alert('Logged in!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
    exit();
} else {
    echo "<script>alert('Error Logging in Try again!');document.location='Login.php'</script>";
}

// close the database connection
mysqli_close($conn);
?>