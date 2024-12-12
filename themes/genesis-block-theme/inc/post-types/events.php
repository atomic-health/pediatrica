<?php

function atomic__register_events_cpt() {
  $labels = array(
      'name'                  => _x( 'Events', 'Post type general name', 'event' ),
      'singular_name'         => _x( 'Event', 'Post type singular name', 'event' ),
      'menu_name'             => _x( 'Events', 'Admin Menu text', 'event' ),
      'name_admin_bar'        => _x( 'Event', 'Add New on Toolbar', 'event' ),
      'add_new'               => __( 'Add New', 'event' ),
      'add_new_item'          => __( 'Add New event', 'event' ),
      'new_item'              => __( 'New event', 'event' ),
      'edit_item'             => __( 'Edit event', 'event' ),
      'view_item'             => __( 'View event', 'event' ),
      'all_items'             => __( 'All events', 'event' ),
      'search_items'          => __( 'Search events', 'event' ),
      'parent_item_colon'     => __( 'Parent events:', 'event' ),
      'not_found'             => __( 'No events found.', 'event' ),
      'not_found_in_trash'    => __( 'No events found in Trash.', 'event' ),
      'featured_image'        => _x( 'Event Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'event' ),
      'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'event' ),
      'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'event' ),
      'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'event' ),
      'archives'              => _x( 'Event archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'event' ),
      'insert_into_item'      => _x( 'Insert into event', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'event' ),
      'uploaded_to_this_item' => _x( 'Uploaded to this event', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'event' ),
      'filter_items_list'     => _x( 'Filter events list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'event' ),
      'items_list_navigation' => _x( 'Events list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'event' ),
      'items_list'            => _x( 'Events list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'event' ),
  );     
  $args = array(
      'labels'             => $labels,
      'description'        => 'Event custom post type.',
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'event' ),
      'capability_type'    => 'post',
      'has_archive'        => true,
      'hierarchical'       => false,
      'menu_icon'          => 'dashicons-calendar-alt',
      'menu_position'      => 20,
      'supports'           => array( 'title', 'editor', 'author', 'thumbnail' ),
      'taxonomies'         => array( ),
      'show_in_rest'       => true
  );
   
  register_post_type( 'event', $args );
}
add_action( 'init', 'atomic__register_events_cpt' );


function wpdocs_create_book_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Event Types', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Event Type', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Event Types', 'textdomain' ),
		'all_items'         => __( 'All Event Types', 'textdomain' ),
		'parent_item'       => __( 'Parent Event Type', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Event Type:', 'textdomain' ),
		'edit_item'         => __( 'Edit Event Type', 'textdomain' ),
		'update_item'       => __( 'Update Event Type', 'textdomain' ),
		'add_new_item'      => __( 'Add New Event Type', 'textdomain' ),
		'new_item_name'     => __( 'New Type Name', 'textdomain' ),
		'menu_name'         => __( 'Event Types', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'event_type' ),
	);

	register_taxonomy( 'event_type', array( 'event' ), $args );
}
// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'wpdocs_create_book_taxonomies', 0 );