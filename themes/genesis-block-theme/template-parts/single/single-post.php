<?php
  $header_class= "";

  if ( has_post_thumbnail() ) {
    $header_class = 'post__has-thumbnail';
  }
?>
<article class="post__single <?php echo $header_class; ?>">
	<header
		class="wp-block-group page__header has-purple-background-color has-background is-layout-constrained wp-container-core-group-is-layout-1 wp-block-group-is-layout-constrained">
		<div class="post__back">
			<a href="<?php echo get_home_url(); ?>/blog">All posts</a>
		</div>
		<h1><?php the_title(); ?></h1>
	</header>
	<main class="post__content">
		<figure class="post__thumbnail">
			<?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
		</figure>

		<?php the_content(); ?>

		<?php get_template_part( 'template-parts/single/single', 'share' ); ?>
	</main>
</article>

<aside class="post__related">
	<header>
		<h3>Recent Posts</h3>
	</header>

	<?php
			the_pattern('Blog - Related Posts');
	?>
</aside>