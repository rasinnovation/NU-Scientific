<?php
	// Start session
	session_start();

	// Redirect if user is logged in
	if (isset($_SESSION['user_id'])) {
		header("Location: account.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Login Page</title>
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
				<h1 class="main-heading__2">NU SCIENTIFIC</h1>
			</header>

			<!-- Sign in Block -->
			<form method="POST" action="private/login_validation.php">
				<div class="container__inner">
					<p class="paragraph">Sign into your account</p>
					<div class="form__group">
						<input type="text"
							   class="form__input"
							   placeholder="User Name"
							   id="username"
							   name="username"
							   required>
						<label for="username"
							   class="form__label">
							User Name
						</label>
					</div>
					<div class="form__group">
						<input type="password"
							   class="form__input"
							   placeholder="Password"
							   id="password"
							   name="password"
							   required>
						<label for="password"
							   class="form__label">
							Password
						</label>
					</div>
					<div class="inline-duo">
						<input type="checkbox"
							   id="checkbox">
						<label for="checkbox">Stay Logged In</label>
						<a href="forgot_password.php"
						   class="gap">
							Forgot password?
						</a>
					</div>
					<div class="btn__block">
						<button
							type="submit"
							class="btn btn--green btn--long">
							sign in
						</button>
					</div>
				</div>
			</form>

			<!-- Forgot password -->
			<div class="container__gap"></div>
			<div class="container__inner">
				<div class="inline-duo">
					<p class="paragraph">Dont have an account?</p>
					<a href="registration.php" class="btn btn--green">Register</a>
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
