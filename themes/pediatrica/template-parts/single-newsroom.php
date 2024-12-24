<article class="post__single">
	<header
		class="wp-block-group page__header has-blue-background-color has-background is-layout-constrained wp-container-core-group-is-layout-1 wp-block-group-is-layout-constrained">
		<div class="post__back">
			<a href="<?php echo get_home_url(); ?>/newsroom">Newsroom</a>
		</div>

    <?php echo do_blocks( '<!-- wp:post-terms {"term":"newsroom-type"} /-->' ); ?>

		<h1><?php the_title(); ?></h1>

    <time><?php echo get_the_date(  ); ?></time>
	</header>
	<main class="post__content">
		<figure class="post__thumbnail">
			<?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
		</figure>

		<?php the_content(); ?>

		<?php get_template_part( 'template-parts/single', 'share' ); ?>
	</main>
</article>

<aside class="post__related">
	<header>
		<h3>More Related News</h3>
	</header>

	<?php
		$current_post_taxonomy = get_the_terms( get_the_ID(), 'newsroom-type' );

		if ( $current_post_taxonomy[0]->slug === 'in-the-news' ) {
			the_pattern('Newsroom - Related In the News');
		}

		if ( $current_post_taxonomy[0]->slug === 'press-releases' ) {
			the_pattern('Newsroom - Related Press Releases');
		}
	?>
</aside>