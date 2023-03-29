<?php
    session_start();

	require_once('include/database.php');

    if (!isset($_SESSION['user_id'])) {
        // Redirect the user to the login page if they are not logged in
        header('Location: login.php');
        exit();
    }

    $conn = connect_db(); // Implement your function to connect to the database

    // Retrieve the cart items for the current user from the database
    $stmt = $conn->prepare("SELECT carts.id, e.name, e.price, carts.quantity FROM carts INNER JOIN equipment e ON carts.equipment_id = e.id WHERE user_id = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();

    // Calculate the total price of the cart items
    $total = 0;
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

        <!-- Main Heading -->
        <section class="container__secondary">
            <header>
                <h1 class="main-heading__2">Shopping Cart</h1>
            </header>
			<div class="container__inner">
				<table>
					<thead>
					<tr>
						<th>Item Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr>
					</thead>
					<tbody>
					<?php while ($row = $result->fetch_assoc()): ?>
						<tr>
							<?php $total += $row['price'] * $row['quantity']; ?>
							<td><?php echo $row['name']; ?></td>
							<td>$<?php echo number_format($row['price'], 2); ?></td>
							<td><?php echo $row['quantity']; ?></td>
							<td>$<?php echo number_format($row['price'] * $row['quantity'], 2); ?></td>
						</tr>
					<?php endwhile; ?>
					<tr>
						<td >Total</td>
						<td>$<?php echo number_format($total, 2); ?></td>
					</tr>
					</tbody>
				</table>
				<input type="hidden" name="total" value="<?php echo $total; ?>">
				<div class="center">
					<a href="checkout.php" class="btn btn--green btn--long btn__block">Checkout</a>
				</div>
			</div>
		</section>

        <!-- Footer Section -->
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
</html>