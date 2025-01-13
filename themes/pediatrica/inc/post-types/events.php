<?php

 //print_r(tribe_get_events(array('start_date' => 'now')));

// global $wp_query;
// var_dump($wp_query);

//print_r(get_post_meta( 1187 ));

// function event_start_time_shortcode() {
//   global $post;
//   print_r($post);
//    $myCity = get_post_meta($post->ID, '_EventStartDate', true);
//    return $myCity;
// }
// add_shortcode( 'event_start_time', 'event_start_time_shortcode' );

// echo 'aca' . do_shortcode( '[event_start_time]' );

//print_r('va' . tribe_get_venue(1187));


/**
 * Get event date in custom format for the query loop block.
 */
add_filter( 'meta_field_block_get_block_content', function ( $block_content, $attributes, $block, $object_id, $object_type ) {
  $field_name = $attributes['fieldName'] ?? '';

  if ( 'event_date' === $field_name ) {
    $start = get_post_meta( $object_id, '_EventStartDate' );

    $day = $start[0] ? '<span class="event__day">' . date("j", strtotime($start[0])) . '</span>': '';
    $month = $start[0] ? '<span class="event__month">' . date("M", strtotime($start[0])) . '</span>' : '';

    $block_content = $day . $month;
  }

  return $block_content;
}, 10, 5);


/**
 * Get event time in custom format for the query loop block.
 */
add_filter( 'meta_field_block_get_block_content', function ( $block_content, $attributes, $block, $object_id, $object_type ) {
  $field_name = $attributes['fieldName'] ?? '';

  if ( 'event_time' === $field_name ) {
    $all_day = get_post_meta( $object_id, '_EventAllDay' );
    $start = get_post_meta( $object_id, '_EventStartDate' );
    $end = get_post_meta( $object_id, '_EventEndDate' );

    $start_time = $start[0] ? date("g:ia", strtotime($start[0])) : '';
    $end_time = $end[0] ? ' - ' . date("g:ia", strtotime($end[0])) : '';

    if ( !empty( $all_day[0] ) && $all_day[0] === 'yes' ) {
      $block_content = "This is an all-day event.";
    } else {
      $block_content = $start_time . $end_time;
    }
  }

  return $block_content;
}, 10, 5);


/**
 * Get event location in custom format for the query loop block.
 */
add_filter( 'meta_field_block_get_block_content', function ( $block_content, $attributes, $block, $object_id, $object_type ) {
  $field_name = $attributes['fieldName'] ?? '';

  if ( 'event_location' === $field_name ) {
    $location_id = get_post_meta( $object_id, '_EventVenueID' );
    $location_data = $location_id ? get_post_meta( $location_id[0] ) : '';

    if( !empty( $location_data ) ) {
      $icon = '<svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8.21447 9.34229C9.34863 9.34229 10.268 8.42287 10.268 7.28871C10.268 6.15456 9.34863 5.23514 8.21447 5.23514C7.08032 5.23514 6.1609 6.15456 6.1609 7.28871C6.1609 8.42287 7.08032 9.34229 8.21447 9.34229Z" stroke="#262626" stroke-width="1.23214" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.21447 15.8453C9.58352 13.1072 13.6907 11.3399 13.6907 7.63098C13.6907 4.60656 11.2389 2.15479 8.21447 2.15479C5.19006 2.15479 2.73828 4.60656 2.73828 7.63098C2.73828 11.3399 6.84542 13.1072 8.21447 15.8453Z" stroke="#262626" stroke-width="1.23214" stroke-linecap="round" stroke-linejoin="round"/></svg>';

      $event_city = $location_data['_VenueCity'][0] ? $location_data['_VenueCity'][0] : '';
      $event_province = $location_data['_VenueProvince'][0] ? ', ' . $location_data['_VenueProvince'][0] : '';

      if( !empty( $event_city ) || !empty( $event_province ) ) {
        $block_content = $icon . '<em>' . $event_city . $event_province . '</em>';
      }
    }
  }

  return $block_content;
}, 10, 5);