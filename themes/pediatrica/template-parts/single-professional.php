<?php
  $back_link = wp_get_referer() ? wp_get_referer() : get_home_url() . '/locations';
?>
<article class="post__single">
	<header
		class="wp-block-group page__header has-blue-background-color has-background is-layout-constrained wp-container-core-group-is-layout-1 wp-block-group-is-layout-constrained">
		<div class="post__back">
			<a href="<?php echo $back_link; ?>">Back</a>
		</div>

    <div class="professional__block">
      <figure class="professional__thumb">
        <?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
      </figure>
      <div class="professional__details">
        <h1><?php the_title(); ?></h1>

        <div class="professional__meta">
          <div class="meta__block">
            <div class="meta__icon">
              <svg width="32" height="34" viewBox="0 0 32 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.9987 18.6668C18.2078 18.6668 19.9987 16.8759 19.9987 14.6668C19.9987 12.4576 18.2078 10.6667 15.9987 10.6667C13.7896 10.6667 11.9987 12.4576 11.9987 14.6668C11.9987 16.8759 13.7896 18.6668 15.9987 18.6668Z" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.9987 31.3334C18.6654 26.0001 26.6654 22.5578 26.6654 15.3334C26.6654 9.44238 21.8897 4.66675 15.9987 4.66675C10.1077 4.66675 5.33203 9.44238 5.33203 15.3334C5.33203 22.5578 13.332 26.0001 15.9987 31.3334Z" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="meta__data">
              <header>Locations</header>
              <?php get_location_names(get_field('location'), true); ?>
            </div>
          </div>

          <?php if ( get_field('languages') ) : ?>
          <div class="meta__block">
            <div class="meta__icon">
            <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17.2187 23.1667H26.7839M17.2187 23.1667L14.668 28.5M17.2187 23.1667L21.039 15.1787C21.3469 14.535 21.5008 14.2132 21.7114 14.1115C21.8946 14.023 22.1081 14.023 22.2912 14.1115C22.5018 14.2132 22.6557 14.535 22.9636 15.1787L26.7839 23.1667M26.7839 23.1667L29.3346 28.5M2.66797 7.16667H10.668M10.668 7.16667H15.3346M10.668 7.16667V4.5M15.3346 7.16667H18.668M15.3346 7.16667C14.6731 11.1097 13.1381 14.6816 10.8887 17.6792M13.3346 19.1667C12.5179 18.7997 11.6848 18.2894 10.8887 17.6792M10.8887 17.6792C9.08533 16.297 7.47165 14.4022 6.66797 12.5M10.8887 17.6792C8.74912 20.5306 5.96322 22.8624 2.66797 24.5" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <div class="meta__data">
              <header>Languages</header>
              <p><?php echo get_field('languages'); ?></p>
            </div>
          </div>
          <?php endif; ?>   
        </div>     
      </div>
    </div>
	</header>

	<main class="post__content">
		<?php the_content(); ?>

    <?php if( have_rows('education') ): ?>
      <section class="professional__education">
        <header>
          <h3>Education</h3>
        </header>

        <?php while ( have_rows('education') ) : the_row(); ?>
        <div class="education__block">
          <header><?php echo the_sub_field('title'); ?></header>
          <p><?php echo the_sub_field('institution'); ?></p>
        </div>
        <?php endwhile; ?>
        
      </section>
    <?php endif; ?>
	</main>
</article>