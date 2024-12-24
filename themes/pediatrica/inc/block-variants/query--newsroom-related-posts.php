<?php

function filter_exclude_current_post( $query, $block ) {	
	global $post;

	$current_post_taxonomy = get_the_terms( $post->ID, 'newsroom-type' );

	$query['post__not_in'] = array(737);
	$query['orderby'] = 'rand';
	$query['post__not_in'] = get_option('sticky_posts');
	$query['tax_query'] = array(
			array(
			'taxonomy' => 'newsroom-type',
			'field' => 'term_id',
			'terms' => $current_post_taxonomy[0]->term_id,
			),
		);
	
	return $query;
}

function newsroom_pre_render_exclude_current_post_query_block( $pre_render, $parsed_block ) {
  if ( !empty($parsed_block['attrs']['namespace']) && 'newsroom--exclude-current' === $parsed_block['attrs']['namespace'] ) {
    add_filter( 'query_loop_block_query_vars', 'filter_exclude_current_post', 10, 2 );
  }
	
  return $pre_render;
}
add_filter( 'pre_render_block', 'newsroom_pre_render_exclude_current_post_query_block', 10, 2 );