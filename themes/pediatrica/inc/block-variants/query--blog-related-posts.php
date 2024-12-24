<?php

/**
 * HANDLE FRONTEND
 */
function filter_posts_exclude_current_post( $query, $block ) {	
	global $post;

	$query['post__not_in'] = array($post->ID);
	
	return $query;
}

function posts_pre_render_exclude_current_post_query_block( $pre_render, $parsed_block ) {
  if ( !empty($parsed_block['attrs']['namespace']) && 'post--exclude-current' === $parsed_block['attrs']['namespace'] ) {
    add_filter( 'query_loop_block_query_vars', 'filter_posts_exclude_current_post', 10, 2 );
  }
	
  return $pre_render;
}
add_filter( 'pre_render_block', 'posts_pre_render_exclude_current_post_query_block', 10, 2 );