<?php
/**
 * Plugin Name:  Get Posts via REST API
 * Description:  Get Posts via Rest API in a table using with jQuery Data.
 * Plugin URI:   https://ryhanrakib.com/
 * Author:       Ryhan Rakib
 * Version:      1.0
 * Text Domain:  ryhanrakib
 * License:      GPL v2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package umbaktech
 */


// Disable direct file access.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
add_action('wp_enqueue_scripts','data_table_js_init');

function data_table_js_init() {
    wp_enqueue_script( 'data_table_js', plugins_url( '/js/data_table.min.js', __FILE__ ));
}
add_action('wp_enqueue_scripts','data_table_css_init');

function data_table_css_init() {
    wp_enqueue_script( 'data_table_css', plugins_url( '/css/data_table.min.css', __FILE__ ));
}
include_once('laf-cpt.php');

/**
 * Get posts via REST API.
 */
function get_posts_via_rest() {

	// Initialize variable.
	$allposts = '';

	// Enter the name of your blog here followed by /wp-json/wp/v2/posts and add filters like this one that limits the result to 2 posts.
	$response = wp_remote_get( 'http://localhost/restapi/wp-json/wp/v2/posts?per_page=2' );

	// Exit if error.
	if ( is_wp_error( $response ) ) {
		return;
	}

	// Get the body.
	$posts = json_decode( wp_remote_retrieve_body( $response ) );

	// Exit if nothing is returned.
	if ( empty( $posts ) ) {
		return;
	}

	// If there are posts.
	if ( ! empty( $posts ) ) {

		// For each post.
		foreach ( $posts as $post ) {

			// Use print_r($post); to get the details of the post and all available fields
			// Format the date.
			$fordate = date( 'n/j/Y', strtotime( $post->modified ) );

			// Show a linked title and post date.
			$allposts .= '<a href="' . esc_url( $post->link ) . '" target=\"_blank\">' . esc_html( $post->title->rendered ) . '</a>  ' . esc_html( $fordate ) . '<br />';
		}
		include_once( 'template/table.php' );



		return $allposts;
	}




}
// Register as a shortcode to be used on the site.
add_shortcode( 'sc_get_posts_via_rest', 'get_posts_via_rest' ); 