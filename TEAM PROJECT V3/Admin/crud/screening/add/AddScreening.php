<!DOCTYPE html>
<html>

<head>
  <style>
    input[type=text],
    input[type=int],
    select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
      width: 100%;
      background-color: rgb(95, 139, 129);
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type=submit]:hover {
      background-color: rgb(151, 197, 186);
    }

    div {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }
  </style>
  <link rel="stylesheet" href="style.css">
  <title>Insert Screening to Database</title>
</head>

<body>
  <h1>Insert Screening to Database</h1>

  <form method="post" action="AddS.php">

  <label for="MovieTitle">Movie:</label>
		<select id="MovieTitle" name="MovieTitle" required>
			<option value="">Select a Movie</option>
			<?php
			// Connect to the database
			$servername = "localhost";
			$username = "root";
			$password = "password";
			$dbname = "cinema";

			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// Retrieve the list of movies from the database
			$sql = "SELECT Title FROM movie";
			$result = $conn->query($sql);

			// Generate the options for the select element
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					echo '<option value="' . $row["Title"] . '">' . $row["Title"] . '</option>';
				}
			}

			// Close the database connection
			$conn->close();
			?>
		</select><br>

    <label for="ScrenNo">ScreenNo:</label>
    <input type="text" id="ScrenNo" name="ScrenNo" placeholder="ScreenNo" required><br><br>

    <label for="Date">Date:</label>
    <input type="text" id="Date" name="Date" placeholder="Date" required><br><br>

    <label for="Time">Time:</label>
    <input type="text" id="Time" name="Time" placeholder="Time" required><br><br>

    <label for="TicketsSold">TicketsSold:</label>
    <input type="text" id="TicketsSold" name="TicketsSold" placeholder="TicketsSold" required><br><br>

    <input type="submit" value="Submit" name="Submit">
  </form>
  <form action="Home(uClzrx1FwBrV)page.html">
    <input type="submit" value="Cancel" />
  </form>
</body>

</html>