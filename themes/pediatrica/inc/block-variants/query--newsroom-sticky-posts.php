<?php

/**
 * HANDLE FRONTEND
 */
function filter_sticky_posts( $query, $block ) {	
	$query['post__in'] = get_option('sticky_posts');
	
	return $query;
}

function newsroom_pre_render_sticky_query_block( $pre_render, $parsed_block ) {
  if ( !empty($parsed_block['attrs']['namespace']) && 'newsroom--sticky' === $parsed_block['attrs']['namespace'] ) {
    add_filter( 'query_loop_block_query_vars', 'filter_sticky_posts', 10, 2 );
  } elseif ( $parsed_block['blockName'] === 'core/query' ) {
		remove_filter( 'query_loop_block_query_vars', 'filter_sticky_posts', 10, 2 );
	}
	
  return $pre_render;
}
add_filter( 'pre_render_block', 'newsroom_pre_render_sticky_query_block', 10, 2 );


/**
 * HANDLE BACKEND
 */
function newsroom_query_sticky_api_filter( $args, $request ) {
  $stickyFilter = $request['doSticky'];

  if ( $stickyFilter == true ) {
    $args['post__in'] = get_option('sticky_posts');
  }
  
  return $args;
}
add_filter( 'rest_newsroom_query', 'newsroom_query_sticky_api_filter', 10, 2 );