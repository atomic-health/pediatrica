<?php

function set_custom_edit_leadership_columns($columns) {
	unset( $columns['date'] );
	$columns['title'] = __( 'Name', 'atomic' );
	$columns['role'] = __( 'Role', 'atomic' );
	$columns['order-in-list'] = __( 'Order', 'atomic' );

	return $columns;
}
add_filter( 'manage_leadership_posts_columns', 'set_custom_edit_leadership_columns' );


function custom_leadership_column( $column, $post_id ) {
	switch ( $column ) {
		case 'role' :
			echo get_post_meta( $post_id , 'leadership-role' , true ); 
			break;

		case 'order-in-list' :
			echo get_post_meta( $post_id , 'order-in-list' , true ); 
			break;
	}
}
add_action( 'manage_leadership_posts_custom_column' , 'custom_leadership_column', 10, 2 );


    
function reorder_leadership_post_list( $query ) {
  if ( isset($query->query['post_type']) && $query->query['post_type'] == 'leadership' ) {
    $query->set('meta_key', 'order-in-list');
    $query->set('orderby', 'meta_value_num');
		$query->set('meta_type', 'NUMERIC');
		$query->set('order', 'ASC');
  }
}
add_action('pre_get_posts', 'reorder_leadership_post_list');