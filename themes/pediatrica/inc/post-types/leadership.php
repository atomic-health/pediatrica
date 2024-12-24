<?php

/**
 * Register a custom block to show the leadership role for the query loop.
 */
function register_leadership_role_field() {
	if( function_exists('acf_register_block_type') ) {
		acf_register_block_type(array(
			'name'              => 'acf_leadership_role',
			'title'             => __('Leadership Role'),
			'description'       => __('A custom block to display the role for a leadership member.'),
			'render_callback'   => 'render_leadership_role_field',
			'category'          => 'formatting',
			'icon'              => 'businessman',
			'keywords'          => array( 'contact', 'title' ),
			'post_types'				=> array( 'leadership', 'page' ),
			'supports'					=> array( 
				'typography'			=> array(
					'fontSize'			=> true,
					'lineHeight'		=> true,
				)
			)
		));
	}
}
add_action('acf/init', 'register_leadership_role_field');


/**
 * Render the block.
 */
function render_leadership_role_field( $block ) {
	$post_id = get_the_ID();
	$role = get_field('leadership-role', $post_id);

	echo '<p>' . $role . '</p>';
}