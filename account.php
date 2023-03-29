<?php
	session_start();
	if (!isset($_SESSION['user_id'])) {
	  // Redirect the user to the login page if they are not logged in
	  header('Location: login.php');
	  exit();
	}

	// Connect to the database
	require_once 'include/database.php';
	$conn = connect_db();
	?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Account Page</title>
		<link
			href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
			rel="stylesheet" />
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<section class="navigation">
			<input
				type="checkbox"
				class="navigation__checkbox"
				id="navi-toggle" />

			<label for="navi-toggle" class="navigation__button">
				<span class="navigation__icon">&nbsp;</span>
			</label>

			<div class="navigation__background">&nbsp;</div>

			<nav class="navigation__nav">
				<ul class="navigation__list">
					<li class="navigation__item"
						><a href="index.html" class="navigation__link"
							>Home</a
						></li
					>
					<li class="navigation__item"
						><a href="login.php" class="navigation__link"
							>Your Account</a
						></li
					>
					<li class="navigation__item"
						><a href="shopping_cart.php" class="navigation__link"
							>Shopping Cart</a
						></li
					>
					<li class="navigation__item"
						><a href="private/logout.php" class="navigation__link"
							>Log out</a
						></li
					>
				</ul>
			</nav>
		</section>
		<section class="container__secondary">
			<div class="container__inner">
				<h2>Order History</h2>
				<?php
				// Retrieve the user's order history from the database
				$user_id = $_SESSION['user_id'];
				$sql = "SELECT 
			  user.username, 
			  customer.name, 
			  orders.order_date, 
			  orders.total_amount 
			FROM 
			  user 
			  JOIN customer ON user.id = customer.user_id 
			  JOIN orders ON customer.id = orders.customer_id 
			WHERE 
			  user.id = $user_id";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					// Display the user's order history in a table
					echo "<table>";
					echo "<tr><th>Username</th><th>Name</th><th>Date</th><th>Total Amount</th></tr>";
					while ($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row['username'] . "</td>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['order_date'] . "</td>";
						echo "<td>$" . number_format($row['total_amount'], 2) . "</td>";
						echo "</tr>";
					}
					echo "</table>";
				} else {
					// Display a message if the user has no order history
					echo "<p>You have no order history.</p>";
				}
				?>
			</div>
		</section>
		<footer class="footer">
			<div class="footer__navigation">
				<ul class="footer__list">
					<li class="footer__item">
						<a href="#" class="footer__link"> Company </a>
					</li>
					<li class="footer__item">
						<a href="#" class="footer__link"> Contact us </a>
					</li>
					<li class="footer__item">
						<a href="#" class="footer__link"> Careers </a>
					</li>
					<li class="footer__item">
						<a href="#" class="footer__link"> Privacy policy </a>
					</li>
					<li class="footer__item">
						<a href="#" class="footer__link"> Terms </a>
					</li>
				</ul>
			</div>
			<p class="footer__copyright">
				Copyright &copy;2023. Built by
				<a href="#" class="footer__link">Rasinnovation.</a>
				Disclaimer: Class Assignment.
			</p>
		</footer>
	</body>
</html>
