<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <title>Registration</title>
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

		<!-- Main Header -->
		<section class="container__secondary">
			<header>
				<h1 class="main-heading__2">NU SCIENTIFIC</h1>
			</header>

			<!-- Sign in Block -->
			<form method="POST" action="private/register.php">
				<div class="container__inner">
					<p class="paragraph">Register for an account</p>
					<?php if (isset($_GET['error_message'])) { ?>
						<p style="color: orangered; padding: 0 7vw"><?php echo $_GET['error_message']; ?></p>
					<?php } ?>
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
						<input type="text"
							   class="form__input"
							   placeholder="Email"
							   id="email"
							   name="email"
							   required>
						<label for="email" class="form__label">Email</label>
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
					<div class="form__group">
						<input type="password"
							   class="form__input"
							   placeholder="Confirm Password"
							   id="confirm_password"
							   name="confirm_password"
							   required>
						<label for="confirm_password"
							   class="form__label">
							Confirm Password
						</label>
					</div>
					<div class="inline-duo">
						<input type="checkbox"
							   id="accept_terms"
							   name="accept_terms"
							   required>
						<label for="accept_terms">
							Accept Terms and Conditions
						</label>
					</div>
					<div class="btn__block">
						<button
							type="submit"
							class="btn btn--green btn--long">
							Register
						</button>
					</div>
				</div>
			</form>

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
