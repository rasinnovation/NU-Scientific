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

	// Retrieve the items in the user's shopping cart from the database
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT * FROM carts, equipment WHERE carts.equipment_id = equipment.id AND user_id = $user_id";
	$result = $conn->query($sql);

	// Calculate the total price of all the items in the shopping cart
	$total = 0;
	while ($row = $result->fetch_assoc()) {
		$total += $row['quantity'] * $row['price'];
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Shopping Cart</title>
        <link
            href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
            rel="stylesheet" />
        <link rel="stylesheet" href="css/style.css" />
    </head>
    <body>
		<!-- Header Bar Section -->
		<section class="navigation">
			<input
				type="checkbox"
				class="navigation__checkbox"
				id="navi-toggle" />

			<!-- Nav Icon -->
			<label for="navi-toggle" class="navigation__button">
				<span class="navigation__icon">&nbsp;</span>
			</label>

			<!-- Nav Icon Navigation Menu Container -->
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
        <form action="private/place-order.php" method="post">
			<div class="container__inner">
				<p class="paragraph">Checkout</p>
				<div class="form__group">
					<label for="shipping-name" class="form__label">Name:</label>
					<input type="text" name="shipping-name" id="shipping-name" class="form__input" required><br>
				</div>
				<div class="form__group">
					<label for="shipping-address" class="form__label">Address:</label>
					<input type="text" name="shipping-address" id="shipping-address" class="form__input" required><br>
				</div>
				<div class="form__group">
					<label for="shipping-city" class="form__label">City:</label>
					<input type="text" name="shipping-city" id="shipping-city" class="form__input" required><br>
				</div>
				<div class="form__group">
					<label for="shipping-state" class="form__label">State:</label>
					<input type="text" name="shipping-state" id="shipping-state" class="form__input" required><br>
				</div>
				<div class="form__group">
					<label for="shipping-zip" class="form__label">Zip Code:</label>
					<input type="text" name="shipping-zip" id="shipping-zip" class="form__input" required><br>
				</div>

				<div class="form__group">
					<label for="card-number" class="form__label">Card Number:</label>
					<input type="text" name="card-number" id="card-number" class="form__input" required><br>
				</div>
				<div class="form__group">
					<label for="card-expiry" class="form__label">Expiration Date:</label>
					<input type="text" name="card-expiry" id="card-expiry" class="form__input" required><br>
				</div>
				<div class="form__group">
					<label for="card-cvv" class="form__label">CVV:</label>
					<input type="text" name="card-cvv" id="card-cvv" class="form__input" required><br>
				</div>
				<div class="center btn__block">
					<input type="hidden" name="total" value="<?php echo $total; ?>">
					<p class="paragraph">Total: <?php echo number_format($total, 2); ?></p>
					<button type="submit" class="btn btn--green btn--long">
						Place Order
					</button>
				</div>
			</div>
        </form>

````        <!-- Footer Section -->
        <section class="container__gap"></section>
        <footer class="footer margin-top">
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
</html>````