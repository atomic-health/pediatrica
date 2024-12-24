<?php
  $location_subeading =  get_post_meta( get_the_ID(), 'wpsl_subheading', true );
  $location_phone = get_post_meta( get_the_ID(), 'wpsl_phone', true );
  $location_email = get_post_meta( get_the_ID(), 'wpsl_email', true );
?>

<article class="post__single">
	<header
		class="wp-block-group page__header has-blue-background-color has-background is-layout-constrained wp-container-core-group-is-layout-1 wp-block-group-is-layout-constrained">
		<div class="post__back">
			<a href="<?php echo get_home_url(); ?>/locations">All locations</a>
		</div>
		
    <div class="location__block">
      <div class="location__details">
        <h1><?php the_title(); ?></h1>
        <?php if ( $location_subeading ) : ?>
          <h2><?php echo $location_subeading; ?></h2>
        <?php endif; ?>

        <div class="location__meta">
          <div class="meta__block">
            <div class="meta__icon">
              <svg width="32" height="34" viewBox="0 0 32 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.9987 18.6668C18.2078 18.6668 19.9987 16.8759 19.9987 14.6668C19.9987 12.4576 18.2078 10.6667 15.9987 10.6667C13.7896 10.6667 11.9987 12.4576 11.9987 14.6668C11.9987 16.8759 13.7896 18.6668 15.9987 18.6668Z" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.9987 31.3334C18.6654 26.0001 26.6654 22.5578 26.6654 15.3334C26.6654 9.44238 21.8897 4.66675 15.9987 4.66675C10.1077 4.66675 5.33203 9.44238 5.33203 15.3334C5.33203 22.5578 13.332 26.0001 15.9987 31.3334Z" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <?php get_location_address( array( $post ) ); ?>
          </div>

          <?php if ( $location_phone ) : ?>
            <div class="meta__block">
              <div class="meta__icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.1737 11.8045C12.1017 13.7373 13.3668 15.5488 14.9689 17.1509C16.571 18.753 18.3825 20.0181 20.3153 20.9461C20.4816 21.0259 20.5647 21.0658 20.6699 21.0965C21.0437 21.2054 21.5027 21.1272 21.8193 20.9005C21.9083 20.8367 21.9846 20.7605 22.137 20.6081C22.6031 20.1419 22.8362 19.9089 23.0706 19.7565C23.9544 19.1818 25.0939 19.1818 25.9777 19.7565C26.2121 19.9089 26.4451 20.1419 26.9113 20.6081L27.1711 20.8679C27.8797 21.5765 28.234 21.9308 28.4265 22.3113C28.8092 23.068 28.8092 23.9617 28.4265 24.7185C28.234 25.099 27.8797 25.4533 27.1711 26.1619L26.9609 26.3721C26.2548 27.0782 25.9017 27.4313 25.4216 27.701C24.889 28.0002 24.0616 28.2153 23.4507 28.2135C22.9001 28.2119 22.5238 28.1051 21.7712 27.8915C17.7267 26.7435 13.9102 24.5775 10.7262 21.3936C7.54224 18.2096 5.37627 14.3931 4.22831 10.3486C4.0147 9.59599 3.9079 9.21969 3.90626 8.66909C3.90444 8.05813 4.11959 7.23081 4.41882 6.69813C4.68848 6.21809 5.04157 5.86501 5.74773 5.15884L5.95791 4.94866C6.6665 4.24007 7.02079 3.88578 7.4013 3.69332C8.15805 3.31056 9.05174 3.31056 9.80849 3.69332C10.189 3.88578 10.5433 4.24007 11.2519 4.94866L11.5117 5.20849C11.9778 5.67463 12.2109 5.9077 12.3633 6.14207C12.938 7.02593 12.938 8.16537 12.3633 9.04922C12.2109 9.28359 11.9778 9.51666 11.5117 9.98281C11.3593 10.1352 11.2831 10.2114 11.2193 10.3005C10.9926 10.6171 10.9143 11.0761 11.0233 11.4499C11.054 11.5551 11.0939 11.6382 11.1737 11.8045Z" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <p>
                <?php
                  echo $location_phone;
                ?>
              </p>
            </div>
          <?php endif; ?>

          <?php if ( $location_email ) : ?>
            <div class="meta__block">
              <div class="meta__icon">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2.66797 9.33325L13.5545 16.9538C14.4361 17.5709 14.8769 17.8795 15.3563 17.999C15.7798 18.1046 16.2228 18.1046 16.6463 17.999C17.1257 17.8795 17.5665 17.5709 18.4481 16.9538L29.3346 9.33325M9.06797 26.6666H22.9346C25.1749 26.6666 26.295 26.6666 27.1506 26.2306C27.9033 25.8471 28.5152 25.2352 28.8987 24.4825C29.3346 23.6269 29.3346 22.5068 29.3346 20.2666V11.7333C29.3346 9.49304 29.3346 8.37294 28.8987 7.51729C28.5152 6.76464 27.9033 6.15272 27.1506 5.76923C26.295 5.33325 25.1749 5.33325 22.9346 5.33325H9.06797C6.82776 5.33325 5.70765 5.33325 4.85201 5.76923C4.09936 6.15272 3.48744 6.76464 3.10394 7.51729C2.66797 8.37294 2.66797 9.49304 2.66797 11.7333V20.2666C2.66797 22.5068 2.66797 23.6269 3.10394 24.4825C3.48744 25.2352 4.09936 25.8471 4.85201 26.2306C5.70765 26.6666 6.82776 26.6666 9.06797 26.6666Z" stroke="white" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </div>
              <p>
                <a href="mailto:<?php echo $location_email; ?>" title="Write an email to <?php the_title(); ?>"><?php echo $location_email ?></a>
              </p>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="location__map">
        <?php echo do_shortcode( '[wpsl_map scrollwheel="false" zoom="16"]' ); ?>
      </div>
    </div>
	</header>

	<main class="post__content">
    <?php if( !empty( get_the_content() ) ) : ?>
      <header>
        <h3>Details</h3>
      </header>
    <?php endif; ?>

		<?php the_content(); ?>
	</main>
</article>

<?php if( !empty( get_field('professionals') ) ) : ?>
<aside class="post__related">
	<header>
		<h3>Meet your Pedriatica Health Group</h3>
	</header>

	<?php
    the_pattern('Professionals');
	?>
</aside>
<?php endif; ?>