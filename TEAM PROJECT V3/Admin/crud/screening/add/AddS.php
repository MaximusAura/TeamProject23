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
    $MovieTitle = $_POST['MovieTitle'];
    $ScrenNo = $_POST['ScrenNo'];
    $Date = $_POST['Date'];
    $Time = $_POST['Time'];
    $TicketsSold = $_POST['TicketsSold'];
  
    // Display preview of new row
   
 echo "<div class ='screenings'>" . "Are you sure you want to add this row?<br>";
    echo "MovieTitle: " . $MovieTitle . "<br>";
    echo "ScrenNo: " . $ScrenNo . "<br>";
    echo "Date: " . $Date . "<br>";
    echo "Time: " . $Time . "<br>";
    echo "TicketsSold: " . $TicketsSold . "<br>";
    echo "<form method='post'>";
    echo "<input type='hidden' name='MovieTitle' value='" . $MovieTitle . "'>";
    echo "<input type='hidden' name='ScrenNo' value='" . $ScrenNo . "'>";
    echo "<input type='hidden' name='Date' value='" . $Date . "'>";
    echo "<input type='hidden' name='Time' value='" . $Time . "'>";
    echo "<input type='hidden' name='TicketsSold' value='" . $TicketsSold . "'>";
    echo "<input type='submit' name='confirm' value='Yes'>";
    echo "<input type='submit' name='cancel' value='No'>";
    echo "</form>" . "</div>";
  } elseif (isset($_POST['confirm'])) {
    $ScrenNo = $_POST['ScrenNo'];
    $Date = $_POST['Date'];
    $Time = $_POST['Time'];
    $TicketsSold = $_POST['TicketsSold'];
    $MovieTitle = $_POST['MovieTitle'];
  
  
    // Insert new row into database
    $sql = "INSERT INTO screening (ScrenNo, Date, Time, TicketsSold,MovieTitle)
    VALUES ('$ScrenNo', '$Date', '$Time', '$TicketsSold','$MovieTitle')";

    $result = mysqli_query($conn, $sql);
    echo "<script>alert('Row added successfully!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
  } elseif (isset($_POST['cancel'])) {
    echo "Insertion canceled";
    echo "<script>alert('Insertion canceled!');document.location='Home(uClzrx1FwBrV)page.html'</script>";
  }
  
  // Close database connection
  mysqli_close($conn);




?>