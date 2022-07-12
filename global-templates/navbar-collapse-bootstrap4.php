<?php
/**
 * Header Navbar (bootstrap4)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<nav id="main-nav" class="navbar navbar-expand-md" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e('Main Navigation', 'understrap'); ?>
	</h2>

	<div class="header-logo-img">
		<!-- Your site title as branding in the menu -->

			<img src="https://www.dahuasecurity.com/_nuxt/img/LOGO_header.57e0e23.png" height="30" width="100" alt="logo">

		<!-- end custom logo -->
	</div>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
				aria-controls="navbarNavDropdown" aria-expanded="false"
				aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- The WordPress Menu goes here -->
		<?php
		wp_nav_menu(
				array(
						'theme_location' => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id' => 'navbarNavDropdown',
						'menu_class' => 'navbar-nav',
						'fallback_cb' => '',
						'menu_id' => 'main-menu',
						'depth' => 2,
						'walker' => new Understrap_WP_Bootstrap_Navwalker(),
				)
		);
		?>

</nav><!-- .site-navigation -->
