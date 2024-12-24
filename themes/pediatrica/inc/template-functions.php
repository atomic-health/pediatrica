<?php


/**
 * Custom login form styles.
 */
function custom_login_styles() { 
	?> 
  <style type="text/css"> 
    #login {
      padding: 10% 0 0 !important;
    }

    body.login div#login h1 a {
      width: 196px;
      height: 77px; 
      margin: 30px auto;
      background: url("<?php echo get_template_directory_uri(); ?>/images/logo--color.svg") center / 100% no-repeat;
    } 

    #loginform,
    #lostpasswordform {
      border-radius: 10px;
      border: none;
      box-shadow: 0 5px 60px 0 rgba(0, 0, 0, .1);
    }

    .login #nav,
    .login #backtoblog {
      text-align: center;
    }

    .login .message, 
    .login .notice, 
    .login .success {
      border-radius: 10px;
    }
  </style>
<?php
}
add_action( 'login_enqueue_scripts', 'custom_login_styles' );


/**
 * Autoload patterns into Newsroom posts.
 */
// function autoload_patterns_for_newsroom_posts( $content, $post ) {
// 	if ( $post->post_type === 'newsroom' ) {
// 			$content = get_the_pattern( 'Newsroom - post title' );    
// 	}
// 	return $content;
// }
// add_filter( 'default_content', 'autoload_patterns_for_newsroom_posts', 10, 2 );


/**
 * Get a pattern by name and print it in the frontend.
 * 
 * @param $name The title/name of the pattern.
 * 
 * @return string
 */
 function get_the_pattern( $name ) {
	$pattern = '';
	$pattern_query = get_posts([
    'title' => $name,
    'post_type' => 'wp_block',
	]);
	
	if( !empty( $pattern_query[0] ) ) {
		$pattern = $pattern_query[0]->post_content;
	}

	return $pattern;
}

function the_pattern( $name ) {
	echo do_blocks( get_the_pattern( $name ) );
}


/**
 * Add custom body classes based on the slug on the frontend.
 * 
 * @param $classes The current list of classes.
 * 
 * @return string 
 */
function custom_body_classes( $classes ) {
	global $post;

	if ( is_page() ) {
		$classes[] = 'page--'.$post->post_name;
	}

	return $classes;
}
add_filter( 'body_class', 'custom_body_classes' );


/**
 * Add custom body classes based on the slug on the admin panel.
 * 
 * @param $classes The current list of classes.
 * 
 * @return string The updated list of classes for the body tag.
 */
function custom_admin_body_classes( $classes ) {
	global $post;
	$screen = get_current_screen();

	if ( $screen->is_block_editor == 1 ) {
		$classes = 'page--'.$post->post_name;
	}

	return $classes;
}
add_filter( 'admin_body_class', 'custom_body_classes' );


/**
 * Print an object/array in a readable format.
 * 
 * @param $query The object or array to print.
 */
function do_log( $query ) {
	echo '<pre style="padding-left: 200px">';
	print_r($query);
	echo '</pre>';
}


/**
 * Remove items from the main menu for non admin users.
 */
function remove_main_menu_items(){
	global $submenu;
	$current_user = wp_get_current_user();

	remove_menu_page('edit-comments.php'); // Comments
	remove_menu_page( 'admin.php?page=filebird-settings' ); // Comments

	if(array_key_exists('themes.php', $submenu)) {
		foreach($submenu['themes.php'] as $i => $item) {
			if (in_array($item['0'], array(__('Customize'), __('Widgets'), __('Background')))) {
				unset($submenu['themes.php'][$i]);
			}
		}
	}

	if( $current_user->roles[0] != 'administrator' ) {
		define( 'DISALLOW_FILE_EDIT', true );
		remove_menu_page('tools.php'); // Comments

	// 	remove_menu_page('plugins.php'); // Plugins
	// 	remove_menu_page('options-general.php'); // Settings
	// 	remove_menu_page('tools.php'); // Tools
	// 	remove_menu_page('post-new.php'); // Tools
	// 	remove_menu_page('edit.php?post_type=acf-field-group'); // ACF
	// 	remove_submenu_page( 'themes.php', 'themes.php' ); // Themes
	// 	remove_submenu_page( 'index.php', 'update-core.php' ); // Wordpress Update
	}
}
add_action( 'admin_menu', 'remove_main_menu_items' );