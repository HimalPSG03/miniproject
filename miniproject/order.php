<!DOCTYPE html>
<html>
<head>
	<title>Game Shop - Orders</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<header>
		<h1>Game Shop</h1>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>
	</header>
	<main>
		<h2>Order Form</h2>
		<form action="place_order.php" method="post">
			<label for="name">Name:</label>
			<input type="text" id="name" name="name" required>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>
			<label for="game">Game:</label>
			<select id="game" name="game" required>
				<option value="" selected disabled>Select a Game</option>
				<?php
				require_once('config.php');
				$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
				$query = "SELECT * FROM games WHERE game_id = ?";
				$stmt = mysqli_prepare($conn, $query);
				mysqli_stmt_bind_param($stmt, "i", $_GET['game_id']);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				$row = mysqli_fetch_assoc($result);
				?>
				<option value="<?php echo $row['game_id']; ?>"><?php echo $row['game_title']; ?></option>
			</select>
			<label for="description">Description:</label>
			<textarea id="description" name="description" readonly><?php echo $row['game_description']; ?></textarea>
			<label for="price">Price:</label>
			<input type="text" id="price" name="price" value="<?php echo $row['game_price']; ?>" readonly>
			<input type="submit" value="Place Order">
		</form>
	</main>
	<footer>
		<p>&copy; 2023 Game Shop</p>
	</footer>
</body>
</html>
