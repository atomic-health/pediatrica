<?php

/**
 * Change the permalink structure for newsroom posts.
 */
function filter_newsroom_post_type_link($link, $post) {
  if ($post->post_type != 'newsroom')
      return $link;

  if ($cats = get_the_terms($post->ID, 'newsroom-type')) {
    if ( $cats[0]->slug == 'in-the-news' ) {
      $link = get_field('external_link', $post->ID) ? get_field('external_link', $post->ID) : '';
    } else {
      $link = str_replace('%newsroom-type%', array_pop($cats)->slug, $link);
    }
  }

  return $link;
}
add_filter('post_type_link', 'filter_newsroom_post_type_link', 10, 2);


/**
 * Change the permalink for the "Read More" link to go to an external URL.
 */
function add_blank_target_to_newsroom_excerpt_link( $block_content, $block ) {
  global $post;

  if ( $post->post_type != 'newsroom' ) {
    return $block_content;
  }

  if ( has_term( 'in-the-news', 'newsroom-type', $post ) ) {
    // Add the custom class to the block content using the HTML API.
    $processor = new WP_HTML_Tag_Processor( $block_content );

    if ( $processor->next_tag( 'a' ) ) {
        $processor->set_attribute( 'target', '_blank' );
    }

    return $processor->get_updated_html();
  } else {
    return $block_content;
  }	
}
add_filter( 'render_block_core/post-excerpt', 'add_blank_target_to_newsroom_excerpt_link', 10, 2 );