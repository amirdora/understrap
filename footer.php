<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>

<div class="footer-wrapper" id="wrapper-footer">

	<div class="row">

		<div class="col-md-12">

			<footer class="site-footer" id="colophon">

				<div class="row footer-top">
					<div id="sidebar-footer" class="sidebar-footer  col-md-2 text-white">
						<?php if (is_active_sidebar('footer-top-left')) : ?>
							<?php dynamic_sidebar('footer-top-left'); ?>
						<?php else : ?>
							<!-- Time to add some widgets! -->
						<?php endif; ?>
					</div>

					<div id="sidebar-footer footer-top-right" class="sidebar-footer pull-right  col-md-10 text-white">
						<?php if (is_active_sidebar('footer-top-right')) : ?>
							<?php dynamic_sidebar('footer-top-right'); ?>
						<?php else : ?>
							<!-- Time to add some widgets! -->
						<?php endif; ?>
					</div>
				</div>

				<div class="row footer-bottom">
					<div id="sidebar-footer" class="sidebar-footer  col-md-9 text-white">
						<?php if (is_active_sidebar('footer-bottom-left')) : ?>
							<?php dynamic_sidebar('footer-bottom-left'); ?>
						<?php else : ?>
							<!-- Time to add some widgets! -->
						<?php endif; ?>
					</div>

					<div id="sidebar-footer" class="sidebar-footer  col-md-3 text-white">
						<?php if (is_active_sidebar('footer-bottom-right')) : ?>
							<?php dynamic_sidebar('footer-bottom-right'); ?>
						<?php else : ?>
							<!-- Time to add some widgets! -->
						<?php endif; ?>
					</div>
				</div>
			</footer><!-- #colophon -->

		</div><!--col end -->

	</div><!-- row end -->

</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

