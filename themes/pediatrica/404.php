<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Atomic Theme
 */

get_header(); 
?>

	<section class="page__single">
		<header class="wp-block-group page__header has-dark-gray-color has-white-background-color has-text-color has-background has-link-color wp-elements-efeae8da481d84104a22f155f47c68d6 is-layout-constrained wp-container-core-group-is-layout-1 wp-block-group-is-layout-constrained">
			<div class="post__back">
				<a href="<?php echo get_home_url(); ?>/">Back to Home</a>
			</div>
			<h1 class="has-text-align-center has-link-color wp-block-post-title has-text-color has-dark-gray-color">Oops. This page doesn’t exist.</h1>
			<p>Let’s get back on track.</p>
		</header>

		<div class="wrapper">
			<h3>Helpful links</h3>

			<div class="links">
			<div class="block">
					<h4>Services</h4>
					<p>See how we can help.</p>

					<p class="wp-block-post-excerpt__more-text">
						<a class="wp-block-post-excerpt__more-link" href="<?php echo get_home_url(); ?>/services/">View More</a>
					</p>
				</div>

				<div class="block">
					<h4>Join Us</h4>
					<p>Be a Pediatrica Provider.</p>
					<p class="wp-block-post-excerpt__more-text">
						<a class="wp-block-post-excerpt__more-link" href="<?php echo get_home_url(); ?>/be-a-pediatrica-provider/">View More</a>
					</p>
				</div>

				<div class="block">
					<h4>Contact Us</h4>
					<p>Get in touch with us.</p>
					<p class="wp-block-post-excerpt__more-text">
						<a class="wp-block-post-excerpt__more-link" href="<?php echo get_home_url(); ?>/contact-us/">View More</a>
					</p>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
