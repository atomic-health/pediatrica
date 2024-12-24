<?php

if ( function_exists( 'register_block_style' ) ) {
	register_block_style(
			'core/button',
			array(
					'name'         => 'has-arrow',
					'label'        => __( 'Has arrow', 'textdomain' ),
					'is_default'   => false
			)
	);

	register_block_style(
		'core/button',
		array(
				'name'         => 'has-rounded-arrow',
				'label'        => __( 'Has rounded arrow', 'textdomain' ),
				'is_default'   => false
		)
	);

	register_block_style(
		'core/button',
		array(
				'name'         => 'has-multicolor-outline',
				'label'        => __( 'Multicolor', 'textdomain' ),
				'is_default'   => false
		)
	);
}