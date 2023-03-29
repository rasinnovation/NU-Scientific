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

        <!--Heading -->
		<header class="main-video-heading">
			<figure class="bg-video">
				<img class="bg-video__content" src="img/head2.jpg" alt="header">
			</figure>
			<h1 class="main-heading">Equipment and Parts</h1>
		</header>

		<!--Get Content-->
		<?php
			if (isset($_GET['page'])) {
				$page_id = $_GET['page'];

				// Load the content from the JSON file
				$content_json = file_get_contents('data/content.json');
				$content_array = json_decode($content_json, true);

				// Check if the page ID exists in the content array
				if (isset($content_array[$page_id])) {
					$page_data = $content_array[$page_id];
					$title = $page_data['title'];
					$price = $page_data['price'];
					$description1 = $page_data['description-1'];
					$description2 = $page_data['description-2'];

					echo '<section class="container__secondary">';
					echo '<h2 class="main-heading__2">' . $title . '</h2>';
					echo '<div class="container__inner">';
					echo '<p class="paragraph">Price: $' . $price . '</p>';
					echo '<p class="paragraph">' . $description1 . '</p>';
					echo '<p class="paragraph">' . $description2 . '</p>';
					echo '<div class="center">';
					echo '<a class="btn btn--green btn--long btn__block" href="private/add-to-cart.php?item=' . urlencode(json_encode($page_data['id'])) . '">Add To Cart</a>';
					echo '</div>';
					echo '</div>';
					echo '</section>';

				} else {
					echo '<h1>Page not found</h1>';
				}
			} else {
				echo '<h1>Page not found</h1>';
			}
			?>
		<!--Script for Add to Cart-->

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