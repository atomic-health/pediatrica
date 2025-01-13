<?php
/**
 * Atomic Theme functions and definitions
 *
 * @package Atomic Theme
 */

if ( ! function_exists( 'atomic_theme_setup' ) ) :
	/**
	 * Sets up Atomic Theme's defaults and registers support for various WordPress features.
	 */
	function atomic_theme_setup() {

		/*
		 * Tell WordPress that this theme supports the way Gutenberg parses and replaces the style-editor.css file in wp-admin.
		 * @see: https://developer.wordpress.org/block-editor/developers/themes/theme-support/#editor-styles
		 */
		add_theme_support( 'editor-styles' );

		/*
		 * Tell WordPress to load the "Gutenberg Theme" stylesheet on the frontend and in the editor.
		 * @see: https://developer.wordpress.org/block-editor/developers/themes/theme-support/#default-block-styles
		 * @see: https://github.com/WordPress/gutenberg/commit/429558ad320c55e3e8b5236dfb6ce139fa3a7d25
		 */
		add_theme_support( 'wp-block-styles' );

		/**
		 * Add support for custom line heights.
		 */
		add_theme_support( 'custom-line-height' );

		/**
		 * Add styles to post editor.
		 */
		add_editor_style( 
			array(
				'style-editor.css', 
				'https://fonts.cdnfonts.com/css/museo-slab-500',
				'https://db.onlinewebfonts.com/c/bf9f5d50c1b928ff21436517a1a95ad9?family=Proxima+Nova',
				'https://fonts.cdnfonts.com/css/neutraface-text',
				'style.css'
			) 
		);

		/**
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		* Post thumbnail support and image sizes.
		*/
		add_theme_support( 'post-thumbnails' );

		/*
		* Add title output.
		*/
		add_theme_support( 'title-tag' );

		/**
		 * Custom Background support.
		 */
		$defaults = array(
			'default-color' => 'ffffff',
		);
		add_theme_support( 'custom-background', $defaults );

		/**
		 * Add wide image support.
		 */
		add_theme_support( 'align-wide' );

		/**
		 * Selective Refresh for Customizer.
		 */
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add excerpt support to pages.
		add_post_type_support( 'page', 'excerpt' );

		// Featured image.
		add_image_size( 'atomic-featured-image', 1200 );

		// Wide featured image.
		add_image_size( 'atomic-featured-image-wide', 1400 );

		// Logo size.
		add_image_size( 'atomic-logo', 300 );

		/**
		 * Register Navigation menu.
		 */
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'atomic' ),
				'footer'  => esc_html__( 'Footer Menu', 'atomic' ),
			)
		);

		/**
		 * Add Site Logo feature.
		 */
		add_theme_support(
			'custom-logo',
			array(
				'header-text' => array( 'titles-wrap' ),
				'size'        => 'atomic-theme-logo',
			)
		);

		/**
		 * Enable HTML5 markup.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'gallery',
				'style',
				'script',
			)
		);

		// Make media embeds responsive.
		add_theme_support( 'responsive-embeds' );
		add_filter(
			'body_class',
			function( $classes ) {
				$classes[] = 'wp-embed-responsive';
				return $classes;
			}
		);
	}
endif; // atomic_theme_setup.
add_action( 'after_setup_theme', 'atomic_theme_setup' );


/**
 * Register widget area.
 */
function atomic_theme_widgets_init() {

	// register_sidebar(
	// 	array(
	// 		'name'          => esc_html__( 'Footer - Column 1', 'atomic' ),
	// 		'id'            => 'footer-1',
	// 		'description'   => esc_html__( 'Widgets added here will appear in the left column of the footer.', 'atomic' ),
	// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</section>',
	// 		'before_title'  => '<h3 class="widget-title">',
	// 		'after_title'   => '</h3>',
	// 	)
	// );
}
add_action( 'widgets_init', 'atomic_theme_widgets_init' );



/**
 * Enqueue scripts and styles.
 */
function atomic_theme_scripts() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'atomic-style', get_stylesheet_uri(), [], $version );

	/**
	* Load fonts.
	*/
 // phpcs:ignore WordPress.WP.EnqueuedResourceParameters.MissingVersion -- see https://core.trac.wordpress.org/ticket/49742
	wp_enqueue_style( 'museo-slab-cdn', 'https://fonts.cdnfonts.com/css/museo-slab-500', [], null );
	wp_enqueue_style( 'proxima-nova-cdn', 'https://db.onlinewebfonts.com/c/bf9f5d50c1b928ff21436517a1a95ad9?family=Proxima+Nova', [], null );
	wp_enqueue_style( 'neutraface-text-cdn', 'https://fonts.cdnfonts.com/css/neutraface-text', [], null );

	/**
	 * Load Atomic Theme's javascript.
	 */
	wp_enqueue_script( 'atomic-js', get_template_directory_uri() . '/js/main.js', [ 'jquery' ], $version, true );

	/**
	 * Localizes the atomic-js file.
	 */
	wp_localize_script(
		'atomic-js',
		'atomic_theme_js_vars',
		array(
			'ajaxurl' => esc_url( admin_url( 'admin-ajax.php' ) ),
		)
	);

	/**
	 * Load the comment reply script.
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'atomic_theme_scripts' );


/**
 * Enqueue admin scripts and styles in editor.
 *
 * @param string $hook The admin page.
 */
function atomic_theme_admin_scripts( $hook ) {
	wp_register_style( 'atomic_wp_admin_css', get_template_directory_uri() . '/style-editor.css', false, '1.0.0' );
	wp_enqueue_style( 'atomic_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'atomic_theme_admin_scripts', 5 );


/**
 * Adjust the grid excerpt length for portfolio items.
 *
 * @return int
 */
function atomic_theme_search_excerpt_length() {
	return 40;
}


/**
 * Add an ellipsis read more link.
 *
 * @param string $more The original more.
 *
 * @return string
 */
function atomic_theme_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}

	return ' &hellip;';
}
add_filter( 'excerpt_more', 'atomic_theme_excerpt_more' );


/**
 * Full size image on attachment pages.
 *
 * @param string $p The attachment HTML output.
 *
 * @return string|none
 */
function atomic_theme_attachment_size( $p ) {
	if ( is_attachment() ) {
		return '<p>' . wp_get_attachment_link( 0, 'full-size', false ) . '</p>';
	}
}
add_filter( 'prepend_attachment', 'atomic_theme_attachment_size' );


/**
 * Check whether the current screen is a Gutenberg Block Editor, or not.
 *
 * @return bool
 */
function atomic_theme_is_block_editor() {

	// If the get_current_screen function doesn't exist, we're not even in wp-admin.
	if ( ! function_exists( 'get_current_screen' ) ) {
		return false;
	}

	// Get the WP_Screen object.
	$current_screen = get_current_screen();

	// Check to see if this version of WP_Screen has the is_block_editor_method.
	if ( ! method_exists( $current_screen, 'is_block_editor' ) ) {
		return false;
	}

	if ( ! $current_screen->is_block_editor() ) {
		return false;
	}

	// This is a Gutenberg Block Editor page.
	return true;
}



/**
 * Include Block variants JS into the block editor.
 */
function include_editor_assets() {
	wp_enqueue_script(
		'custom-block-variations',
		get_template_directory_uri() . '/js/block-variations.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ) // loads dependencies
	);

	wp_enqueue_script( 
		'fix-loops', 
		get_template_directory_uri() . '/js/admin.js', 
		['jquery'], 
		null
	);
}
add_action( 'enqueue_block_editor_assets', 'include_editor_assets' );



/**
 * Template functions.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Nav walkers.
 */
require get_template_directory() . '/inc/menu/walker__main-nav.php';
require get_template_directory() . '/inc/menu/walker__footer-nav.php';


/**
 * Custom admin columns.
 */
require get_template_directory() . '/inc/admin-columns/leadership.php';
require get_template_directory() . '/inc/admin-columns/professionals.php';
require get_template_directory() . '/inc/admin-columns/locations.php';


/**
 * Custom Post Types functions.
 */
require get_template_directory() . '/inc/post-types/locations.php';
require get_template_directory() . '/inc/post-types/newsroom.php';
require get_template_directory() . '/inc/post-types/leadership.php';
require get_template_directory() . '/inc/post-types/events.php';


/**
 * Block variants and styles.
 */
require get_template_directory() . '/inc/block-variants/buttons.php';
require get_template_directory() . '/inc/block-variants/query--blog-related-posts.php';
require get_template_directory() . '/inc/block-variants/query--newsroom-related-posts.php';
require get_template_directory() . '/inc/block-variants/query--newsroom-sticky-posts.php';
require get_template_directory() . '/inc/block-variants/query--professionals.php';
require get_template_directory() . '/inc/block-variants/query--events.php';