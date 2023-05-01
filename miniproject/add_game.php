<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game_shop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $title = $_POST["title"];
  $description = $_POST["description"];
  $price = $_POST["price"];
  $image = $_POST["image"];

  // Prepare and execute SQL query to insert the new game
  $sql = "INSERT INTO games (title, description, price, image)
  VALUES ('$title', '$description', '$price', '$image')";

  if (mysqli_query($conn, $sql)) {
    echo "Game added successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Game</title>
</head>
<body>
  <h1>Add Game</h1>
  <form method="post">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title"><br>

    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea><br>

    <label for="price">Price:</label>
    <input type="number" name="price" id="price" step="0.01"><br>

    <label for="image">Image:</label>
    <input type="text" name="image" id="image"><br>

    <input type="submit" value="Add Game">
  </form>
</body>
</html>
