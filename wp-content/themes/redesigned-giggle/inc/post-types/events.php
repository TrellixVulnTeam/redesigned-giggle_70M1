<?php
add_action( 'init', 'redesigned_giggle_register_post_type_events' );
function redesigned_giggle_register_post_type_events() {
	$args = [
		'label'  => esc_html__( 'Events', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Events', 'redesigned-giggle' ),
			'name_admin_bar'     => esc_html__( 'Event', 'redesigned-giggle' ),
			'add_new'            => esc_html__( 'Add Event', 'redesigned-giggle' ),
			'add_new_item'       => esc_html__( 'Add new Event', 'redesigned-giggle' ),
			'new_item'           => esc_html__( 'New Event', 'redesigned-giggle' ),
			'edit_item'          => esc_html__( 'Edit Event', 'redesigned-giggle' ),
			'view_item'          => esc_html__( 'View Event', 'redesigned-giggle' ),
			'update_item'        => esc_html__( 'View Event', 'redesigned-giggle' ),
			'all_items'          => esc_html__( 'All Events', 'redesigned-giggle' ),
			'search_items'       => esc_html__( 'Search Events', 'redesigned-giggle' ),
			'parent_item_colon'  => esc_html__( 'Parent Event', 'redesigned-giggle' ),
			'not_found'          => esc_html__( 'No Events found', 'redesigned-giggle' ),
			'not_found_in_trash' => esc_html__( 'No Events found in Trash', 'redesigned-giggle' ),
			'name'               => esc_html__( 'Events', 'redesigned-giggle' ),
			'singular_name'      => esc_html__( 'Event', 'redesigned-giggle' ),
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
		'menu_icon'           => 'dashicons-calendar-alt',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
			'page-attributes',
		],
		'taxonomies' => [
			'category',
			'tag',
		],
		'rewrite' => true
	];

	register_post_type( 'event', $args );
}