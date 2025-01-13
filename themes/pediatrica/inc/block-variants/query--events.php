<?php

/**
 * HANDLE FRONTEND
 */
function filter_events_frontend( $query, $block ) {	
	//$query['post__in'] = get_option('sticky_posts');

  $query['orderby'] = 'meta_value';
  $query['meta_type'] = 'DATE';
  $query['meta_key'] = '_EventStartDate';
  $query['order'] = 'ASC';
  $query['meta_query'] = array(
    array(
      'key'        => '_EventEndDate',
      'value'        => date('Y-m-d G:i:s'),
      'type'        => 'DATE',
      'compare'    => '>='
    ),
  );
	
	return $query;
}

function events_prerender_query_block( $pre_render, $parsed_block ) {
  if ( !empty($parsed_block['attrs']['namespace']) && 'events' === $parsed_block['attrs']['namespace'] ) {
    add_filter( 'query_loop_block_query_vars', 'filter_events_frontend', 10, 2 );
  } elseif ( $parsed_block['blockName'] === 'core/query' ) {
		remove_filter( 'query_loop_block_query_vars', 'filter_events_frontend', 10, 2 );
	}
	
  return $pre_render;
}
add_filter( 'pre_render_block', 'events_prerender_query_block', 10, 2 );


/**
 * HANDLE BACKEND
 */
function events_api_filter( $args, $request ) {
  $filter = $request['isEvents'];

  if ( $filter == true ) {
    $args['orderby'] = 'meta_value';
    $args['meta_type'] = 'DATE';
    $args['meta_key'] = '_EventStartDate';
    $args['order'] = 'ASC';
    $args['meta_query'] = array(
      array(
        'key'        => '_EventEndDate',
        'value'        => date('Y-m-d G:i:s'),
        'type'        => 'DATE',
        'compare'    => '>='
      ),
    );
  }
  
  return $args;
}
add_filter( 'rest_tribe_events_query', 'events_api_filter', 10, 2 );