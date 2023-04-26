<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SkyLinePress
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'skylinepress'); ?></a>

		<header id="masthead" class="site-header">
			<nav class="navbar">
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<div class="menu-toggle" id="mobile-menu">
					<span class="bar"></span>
					<span class="bar"></span>
					<span class="bar"></span>
				</div>
				<?php
				wp_nav_menu(
					array(
						'menu' => 'header',
						'container' => '',
						'theme_location' => 'header',
						'walker' => new Custom_Walker(),
						'menu_class' => 'main-nav',
					)
				);
				?>
			</nav>
		</header><!-- #masthead -->
		<section class="landing__section">
			<h1 class="landing__title"><?php the_title() ?></h1>
			<p class="landing__excerpt"><?php echo get_the_excerpt(); ?></p>
			<div class="landingBtn__container">
				<button class="landing__btn btncolor1">See our work</button>
				<button class="landing__btn btncolor2">Get SkyLinePress</button>
			</div>
			<div class="landing__cover"></div>
			<img class="landing__img" src="<?php the_post_thumbnail_url('large') ?>">
		</section>