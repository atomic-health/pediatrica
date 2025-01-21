<?php

/**
 * Override the labels for the WP Store Locator plugin.
 */
function customize_locations_post_type_labels( $args, $post_type ) {
	if ( $post_type !== 'wpsl_stores' ) {
		return $args;
	}

	$labels = array(
		'name'                  => 'Locations',
		'singular_name'         => 'Location',
		'menu_name'             => 'Locations',
		'name_admin_bar'        => 'Locations',
		'archives'              => 'Location Archives',
		'attributes'            => 'Location Attributes',
		'parent_item_colon'     => 'Parent Location',
		'all_items'             => 'All Locations',
		'add_new_item'          => 'Add New Location',
		'add_new'               => 'Add New',
		'new_item'              => 'New Location',
		'edit_item'             => 'Edit Location',
		'update_item'           => 'Update Location',
		'view_item'             => 'View Location',
		'view_items'            => 'View Locations',
		'search_items'          => 'Search Location',
		'not_found'             => 'Not found',
		'not_found_in_trash'    => 'Not found in Trash',
		'featured_image'        => 'Featured Image',
		'set_featured_image'    => 'Set featured image',
		'remove_featured_image' => 'Remove featured image',
		'use_featured_image'    => 'Use as featured image',
		'insert_into_item'      => 'Insert into Location',
		'uploaded_to_this_item' => 'Uploaded to this location',
		'items_list'            => 'Locations list',
		'items_list_navigation' => 'Locations list navigation',
		'filter_items_list'     => 'Filter locations list',
	);

	$args['labels'] = $labels;

	return $args;
}
add_filter( 'register_post_type_args', 'customize_locations_post_type_labels', 10, 2 );


/**
 * Change the title placeholder for the edit post screen.
 */
function custom_location_title( $input ) {
  global $post_type;

  if( is_admin() && 'Enter store title here' == $input && 'wpsl_stores' == $post_type ) {
    return 'Enter location name';
  }

  return $input;
}
add_filter('gettext','custom_location_title');


/**
 * Customize the location additional meta boxes.
 */
function locations_custom_meta_boxes( $meta_fields ) {
	unset($meta_fields[__( 'Additional Information', 'wpsl' )]['fax']);
	unset($meta_fields[__( 'Additional Information', 'wpsl' )]['url']);
    
	$meta_fields[__( 'Additional Information', 'wpsl' )] = array(
		'subheading' => array(
				'label' => __( 'Sub Heading', 'wpsl' )
		),
		'phone' => array(
				'label' => __( 'Tel', 'wpsl' )
		),
		'email' => array(
				'label' => __( 'Email', 'wpsl' )
		),
	);

    return $meta_fields;
}
add_filter( 'wpsl_meta_box_fields', 'locations_custom_meta_boxes' );


/**
 * Add the field to the frontend JSON response.
 */
function custom_locations_meta_boxes( $store_fields ) {
  $store_fields['wpsl_subheading'] = array( 
      'name' => 'subheading',
      'type' => 'text'
  );

  return $store_fields;
}
add_filter( 'wpsl_frontend_meta_fields', 'custom_locations_meta_boxes' );


/**
 * Custom layout for the locations results.
 */
function custom_locations_result_layout() {
	global $wpsl, $wpsl_settings;

	$listing_template = 
		'<li data-store-id="<%= id %>" class="location__info">' . 
			'<a href="<%= permalink %>" title="See this location">' .
				'<header>' .
					'<span><%= store %></span>' .
					'<% if ( subheading ) { %>' .
					'<span>(<%= subheading %>)</span>' .
					'<% } %>' .
					'<em>'.wpsl_address_format_placeholders().'</em>' .  
				'</header>' .
				'<span class="icon">' .
					'<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_725_9315)"><path d="M19.3359 9.22217C19.3359 15.4444 11.3359 20.7777 11.3359 20.7777C11.3359 20.7777 3.33594 15.4444 3.33594 9.22217C3.33594 7.10044 4.17879 5.0656 5.67908 3.56531C7.17937 2.06502 9.21421 1.22217 11.3359 1.22217C13.4577 1.22217 15.4925 2.06502 16.9928 3.56531C18.4931 5.0656 19.3359 7.10044 19.3359 9.22217Z" stroke="#293F76" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M11.3359 11.8888C12.8087 11.8888 14.0026 10.6949 14.0026 9.22217C14.0026 7.74941 12.8087 6.5555 11.3359 6.5555C9.86318 6.5555 8.66927 7.74941 8.66927 9.22217C8.66927 10.6949 9.86318 11.8888 11.3359 11.8888Z" stroke="#293F76" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></g><defs><clipPath id="clip0_725_9315"><rect width="21.3333" height="21.3333" fill="white" transform="translate(0.667969 0.333252)"/></clipPath></defs></svg>' .
					'<%= distance %> ' . $wpsl_settings['distance_unit'] .
				'</span>' .
			'</a>' .
		'</li>';

	return $listing_template;
}
add_filter( 'wpsl_listing_template', 'custom_locations_result_layout' );


/**
 * Print the location full address.
 */
function get_location_address($locations, $return_link = false) {
	if ( !is_array($locations) || empty($locations) ) {
		return "There's no address for this location";
	}

	foreach ($locations as $location) {
		//var_dump($location);
		$location_id = $location->ID;
		$location_name = $location->post_title;

		$location_address = get_post_meta( $location_id, 'wpsl_address', true );
		$location_address2 = get_post_meta( $location_id, 'wpsl_address2', true );
		$location_city = get_post_meta( $location_id, 'wpsl_city', true );
		$location_state = get_post_meta( $location_id, 'wpsl_state', true );
		$location_zip = get_post_meta( $location_id, 'wpsl_zip', true );

		echo '<p>';
		echo ($return_link) ? '<a href="' . get_the_permalink( $location_id ) . '" title="See ' . $location_name . '">' : '';
		echo $location_address . ', ';
		echo $location_address2 . ' ';
		echo $location_city . ', ';
		echo $location_state . ' ';
		echo $location_zip;
		echo ($return_link) ? '</a>' : '';
		echo '</p>';
	}
}


/**
 * Print the location names with links.
 */
function get_location_names($locations, $return_link = false) {
	if ( !is_array($locations) || empty($locations) ) {
		return "There's no location with this name";
	}

	foreach ($locations as $location) {
		//var_dump($location);
		$location_id = $location->ID;
		$location_name = $location->post_title;

		echo '<p>';
		echo ($return_link) ? '<a href="' . get_the_permalink( $location_id ) . '" title="See ' . $location_name . '">' : '';
		echo $location->post_title;
		echo ($return_link) ? '</a>' : '';
		echo '</p>';
	}
}