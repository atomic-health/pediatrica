<?php
/**
 * Plugin Name:       Add Animations to blocks
 * Description:       Extends "core/group" and "core/column" blocks to enable reveal animations.
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Version:           0.1.0
 * Author:            Damian Muti
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       add-animations
 *
 * @package Damianmuti
 */

namespace damianmuti;

/**
 * Enqueue block editor only Javascript
 */
function enqueue_editor_modifications() {
	$assets_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

	wp_enqueue_script( 
		'add-animations', 
		plugin_dir_url( __FILE__ ) . 'build/index.js', 
		$assets_file['dependencies'], 
		$assets_file['version'], 
		true 
	);

	wp_enqueue_style( 
		'add-animations-editor-styles', 
		plugin_dir_url( __FILE__ ) . 'build/index.css', 
		[], 
		null
	);

}
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_editor_modifications' );


function enqueue_animations_assets() {
	$assets_file = include( plugin_dir_path( __FILE__ ) . 'build/index.asset.php');

	wp_enqueue_style( 
		'add-animations-styles', 
		plugin_dir_url( __FILE__ ) . 'build/style-index.css', 
		[], 
		null
	);

	wp_enqueue_script( 
		'add-animations-js', 
		plugin_dir_url( __FILE__ ) . 'src/vendor/jquery.visible.js', 
		array('jquery'),
		$assets_file['version'], 
		true 
	);

}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_animations_assets' );