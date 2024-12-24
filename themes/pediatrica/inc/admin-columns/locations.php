<?php

function set_custom_edit_wpsl_stores_columns($columns) {
	unset( $columns['author'] );
	unset( $columns['taxonomy-wpsl_store_category'] );
	unset( $columns['date'] );

	$columns['title'] = __( 'Name', 'atomic' );

	return $columns;
}
add_filter( 'manage_wpsl_stores_posts_columns', 'set_custom_edit_wpsl_stores_columns' );