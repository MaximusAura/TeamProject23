<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="style.css" />
	<style>
		.purchase {
			border: 3px solid;
			border-style: solid;
			padding-left: 10px;
			border-spacing: 0;
			width: 300px;
			margin-left: auto;
			margin-right: auto;
			background-color: white;
		}

		.padding {
			background-color: rgb(95, 139, 129);
		}

		.button {
			background-color: rgb(95, 139, 129);
			border: none;
			color: white;
			/* padding: 15px 32px; */
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			border-radius: 12px;
			width: 48%;
			/* added to make buttons equal width */
		}

		.button:first-child {
			margin-right: 4%;
		}

		.button:last-child {
			margin-left: 4%;
		}
	</style>
	<title>Movie Booking Form</title>
</head>

<body>
	<h1>Movie Booking Form</h1>
	<div class="padding">
		<div class="purchase">
			<form method="post" action="process_booking.php">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" required><br>

				<label for="email">Email:</label>
				<input type="email" id="email" name="email" required><br>

				<label for="Movie">Movie:</label>
				<select id="Movie" name="Movie" required>
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

				<label for="ScreenID">ScreenID:</label>
				<select id="ScreenID" name="ScreenID" required>
					<option value="">Select a ScreenID</option>
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

					// Retrieve the list of ScreenID's from the database
					$sql = "SELECT ScrenNo FROM screening";
					$result = $conn->query($sql);

					// Generate the options for the select element
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo '<option value="' . $row["ScrenNo"] . '">' . $row["ScrenNo"] . '</option>';
						}
					}

					// Close the database connection
					$conn->close();
					?>
				</select><br>


				<label for="Screening">Screening:</label>
				<select id="Screening" name="Screening" required>
				<option value="">Select a Screening Time</option>
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

					// Retrieve the list of ScreenID's from the database
					$sql = "SELECT Time FROM screening WHERE ScrenNo = ScrenNo";
					$result = $conn->query($sql);

					// Generate the options for the select element
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo '<option value="' . $row["Time"] . '">' . $row["Time"] . '</option>';
						}
					}

					// Close the database connection
					$conn->close();
					?>
				</select><br>

				<label for="numTickets">Number of Tickets:</label>
				<input type="number" id="numTickets" name="numTickets" required><br>

				<input type="submit" value="Book Now" class="button">
			</form>

			<form action="Homepage.html">
				<input type="submit" value="Cancel" class="button" />
			</form>
		</div>
	</div>
</body>

</html>