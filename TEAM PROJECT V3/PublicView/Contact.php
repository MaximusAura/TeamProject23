<!DOCTYPE html>
<html>

<head>
  <style>
    input[type=text],
    input[type=int],
    input[type=query],
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
  <title>Add complaint</title>
</head>

<body>
  <h1>Add complaint</h1>

  <form method="post" action="">

    <label for="name">Name:</label>
    <input type="text" id="name" name="complaint" required><br><br>

    <label for="email">Email:</label>
    <input type="text" id="email" name="complaint" required><br><br>

    <label for="query">Query:</label>
    <input type="query" id="query" name="complaint" required><br><br>

    <input type="submit" value="Submit">
  </form>
  <form action="Homepage.html">
    <input type="submit" value="Cancel" />
  </form>
</body>
<?php
if (isset($_POST["complaint"])) {

  echo "<script>alert('Complaint sent!');document.location='Homepage.html'</script>";
  exit();
}
?>

</html>