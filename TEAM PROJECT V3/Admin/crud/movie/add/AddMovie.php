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
  <title>Insert Data to Database</title>
</head>

<body>
  <h1>Insert Data to Database</h1>
  <form method="post" action="Add.php">

    <!-- <label for="MovieID">ID:</label>
    <input type="int" id="MovieID" name="MovieID" placeholder="ID" required><br><br> -->

    <label for="Movie_Name">Movie Name:</label>
    <input type="text" id="Title" name="Title" placeholder="Movie Name" required><br><br>

    <label for="Genre">Genre:</label>
    <input type="text" id="Genre" name="Genre" placeholder="Genre" required><br><br>

    <label for="Rating">Rating:</label>
    <input type="text" id="Rating" name="Rating" placeholder="Rating" required><br><br>

    <label for="Duration">Duration:</label>
    <input type="text" id="Duration" name="Duration" placeholder="Duration" required><br><br>

    <input type="submit" value="Submit" name="Submit">
  </form>
  <form action="Home(uClzrx1FwBrV)page.html">
    <input type="submit" value="Cancel" />
  </form>
</body>

</html>