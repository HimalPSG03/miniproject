<!DOCTYPE html>
<html>
<head>
  <title>Game Shop - Homepage</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <h1>Game Shop</h1>
  </header>
  <main>
    <h2>Games Available</h2>
    <div class="games-list">
      <?php
      // Retrieve games from the database and display them
      $conn = mysqli_connect("localhost", "username", "password", "game_shop");
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      $sql = "SELECT * FROM games";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo '<div class="game-item">';
          echo '<img src="' . $row["image"] . '">';
          echo '<h3>' . $row["title"] . '</h3>';
          echo '<p>' . $row["description"] . '</p>';
          echo '<p class="price">$' . $row["price"] . '</p>';
          echo '<a href="order.php?game_id=' . $row["id"] . '">Buy Now</a>';
          echo '</div>';
        }
      } else {
        echo "No games available.";
      }
      mysqli_close($conn);
      ?>
    </div>
  </main>
</body>
</html>
