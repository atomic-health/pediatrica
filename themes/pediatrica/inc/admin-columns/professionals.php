<?php

function set_custom_edit_professional_columns($columns) {
	unset( $columns['date'] );
	
	$columns['title'] = __( 'Name', 'atomic' );
	$columns['locations'] = __( 'Locations', 'atomic' );


	return $columns;
}
add_filter( 'manage_professional_posts_columns', 'set_custom_edit_professional_columns' );


function custom_professional_column( $column, $post_id ) {
	$get_locations = get_field('location', $post_id);

	switch ( $column ) {
		case 'locations' :
			if( $get_locations && !empty( $get_locations ) ) {
				foreach ($get_locations as $location) {
					echo '<a style="display: block" href="' . get_permalink( $location->ID ) . '">' . $location->post_title . '</a>';
				}
			} else {
				echo '--';
			}

			break;
	}
}
add_action( 'manage_professional_posts_custom_column' , 'custom_professional_column', 10, 2 );



// /**
//  * Change the permalink structure for professionals.
//  */
// function filter_professionals_link($link, $professional) {
// 	global $wp_query;

// 	if ( $professional->post_type != 'professional' ) {
// 		return $link;
// 	}

// 	if ( !is_admin() ) {
// 		$link = str_replace('%location-name%', $wp_query->query['name'], $link);
// 	}
	

// 	return $link;
// }
// add_filter('post_type_link', 'filter_professionals_link', 10, 2);