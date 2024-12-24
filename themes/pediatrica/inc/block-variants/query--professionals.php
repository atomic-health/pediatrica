<?php

/**
 * HANDLE FRONTEND
 */
function filter_professionals_for_location( $query, $block ) {	
	global $post;

	$location_id = $post->ID;
	$professionals = get_field('professionals', $location_id);

	if ( $professionals && is_array( $professionals ) && !empty( $professionals ) ) {
		$query['post__in'] = $professionals;
	}
	
	return $query;
}

function professionals_pre_render_query_block( $pre_render, $parsed_block ) {
  if ( !empty($parsed_block['attrs']['namespace']) && 'professionals' === $parsed_block['attrs']['namespace'] ) {
    add_filter( 'query_loop_block_query_vars', 'filter_professionals_for_location', 10, 2 );
  } elseif ( $parsed_block['blockName'] === 'core/query' ) {
		remove_filter( 'query_loop_block_query_vars', 'filter_professionals_for_location', 10, 2 );
	}
	
  return $pre_render;
}
add_filter( 'pre_render_block', 'professionals_pre_render_query_block', 10, 2 );