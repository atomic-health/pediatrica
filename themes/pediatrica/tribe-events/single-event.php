<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = Tribe__Events__Main::postIdHelper( get_the_ID() );

/**
 * Allows filtering of the event ID.
 *
 * @since 6.0.1
 *
 * @param numeric $event_id
 */
$event_id = apply_filters( 'tec_events_single_event_id', $event_id );

/**
 * Allows filtering of the single event template title classes.
 *
 * @since 5.8.0
 *
 * @param array   $title_classes List of classes to create the class string from.
 * @param numeric $event_id      The ID of the displayed event.
 */
$title_classes = apply_filters( 'tribe_events_single_event_title_classes', [ 'tribe-events-single-event-title' ], $event_id );
$title_classes = implode( ' ', tribe_get_classes( $title_classes ) );

/**
 * Allows filtering of the single event template title before HTML.
 *
 * @since 5.8.0
 *
 * @param string  $before   HTML string to display before the title text.
 * @param numeric $event_id The ID of the displayed event.
 */
$before = apply_filters( 'tribe_events_single_event_title_html_before', '<h1 class="' . $title_classes . '">', $event_id );

/**
 * Allows filtering of the single event template title after HTML.
 *
 * @since 5.8.0
 *
 * @param string  $after    HTML string to display after the title text.
 * @param numeric $event_id The ID of the displayed event.
 */
$after = apply_filters( 'tribe_events_single_event_title_html_after', '</h1>', $event_id );

/**
 * Allows filtering of the single event template title HTML.
 *
 * @since 5.8.0
 *
 * @param string  $after    HTML string to display. Return an empty string to not display the title.
 * @param numeric $event_id The ID of the displayed event.
 */
$title = apply_filters( 'tribe_events_single_event_title_html', the_title( $before, $after, false ), $event_id );
$cost  = tribe_get_formatted_cost( $event_id );

?>
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
			<a href="<?php echo get_home_url(); ?>/events/">All events</a>
		</div>
	</header>
	<main class="post__content post__event">
		<div class="wp-block-query is-layout-flow wp-block-query-is-layout-flow">
			<ul class="blog__featured wp-block-post-template is-layout-flow wp-block-post-template-is-layout-flow">
				<li	class="wp-block-post post-446 post type-post status-publish format-standard has-post-thumbnail hentry category-et-consectetur sticky">

					<div class="wp-block-columns are-vertically-aligned-center is-layout-flex wp-container-core-columns-is-layout-1 wp-block-columns-is-layout-flex" 
						style="margin-top:0px;margin-bottom:0px">
						<div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow"
							style="flex-basis:49%">
							<figure class="wp-block-post-featured-image">
								<?php echo get_the_post_thumbnail( get_the_ID(), 'full' ); ?>
							</figure>
						</div>



						<div class="wp-block-column is-vertically-aligned-center is-layout-flow wp-block-column-is-layout-flow"
							style="padding-right:50px;flex-basis:51%">
							<?php echo do_blocks( '<!-- wp:post-terms {"term":"tribe_events_cat"} /-->' ); ?>

							<h2 style="font-size:36px;line-height:1.4;" class="wp-block-post-title">
								<?php the_title(); ?>
								
							</h2>

							<div class="wp-block-post-excerpt">
								<p class="wp-block-post-excerpt__more-text">
									<a class="wp-block-post-excerpt__more-link" href="https://pediatrica.local/blog/laudantium-quibusdam-veniam-aut/">
										RSVP
									</a>
								</p>
							</div>
						</div>
					</div>

				</li>
			</ul>
		</div>

		<?php the_content(); ?>

		<hr>

		<!-- Event meta -->
		<!-- <?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
		<?php tribe_get_template_part( 'modules/meta' ); ?>
		<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?> -->
	</main>
</article>

<?php
	the_pattern('Page CTA');
?>