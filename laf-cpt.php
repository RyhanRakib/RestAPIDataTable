<?php
add_action( 'init', 'lost_and_found' );
function lost_and_found() {
	$args = [
		'label'  => esc_html__( 'Lost And Found', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Lost And Found', 'ryhanrakib.com' ),
			'name_admin_bar'     => esc_html__( 'LAF', 'ryhanrakib.com' ),
			'add_new'            => esc_html__( 'Add LAF', 'ryhanrakib.com' ),
			'add_new_item'       => esc_html__( 'Add new LAF', 'ryhanrakib.com' ),
			'new_item'           => esc_html__( 'New LAF', 'ryhanrakib.com' ),
			'edit_item'          => esc_html__( 'Edit LAF', 'ryhanrakib.com' ),
			'view_item'          => esc_html__( 'View LAF', 'ryhanrakib.com' ),
			'update_item'        => esc_html__( 'View LAF', 'ryhanrakib.com' ),
			'all_items'          => esc_html__( 'All Lost And Found', 'ryhanrakib.com' ),
			'search_items'       => esc_html__( 'Search Lost And Found', 'ryhanrakib.com' ),
			'parent_item_colon'  => esc_html__( 'Parent LAF', 'ryhanrakib.com' ),
			'not_found'          => esc_html__( 'No LAF found', 'ryhanrakib.com' ),
			'not_found_in_trash' => esc_html__( 'No Lost And Found found in Trash', 'ryhanrakib.com' ),
			'name'               => esc_html__( 'Lost And Found', 'ryhanrakib.com' ),
			'singular_name'      => esc_html__( 'LAF', 'ryhanrakib.com' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'rest_base'           => 'loastandfound',
		'menu_icon'           => 'dashicons-products',
		'supports' => [
			'title',
			'editor',
			'author',
			'thumbnail',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'page-attributes',
			'custom-fields',
		],
		'taxonomies' => [
			'category',
			'tag',
		],
		'rewrite' => true
	];

	register_post_type( 'laf', $args );
}