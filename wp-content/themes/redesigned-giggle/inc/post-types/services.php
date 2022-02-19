<?php
add_action( 'init', 'redesigned_giggle_register_post_type_services' );
function redesigned_giggle_register_post_type_services() {
	$args = [
		'label'  => esc_html__( 'Services', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Services', 'redesigned-giggle' ),
			'name_admin_bar'     => esc_html__( 'Service', 'redesigned-giggle' ),
			'add_new'            => esc_html__( 'Add Service', 'redesigned-giggle' ),
			'add_new_item'       => esc_html__( 'Add new Service', 'redesigned-giggle' ),
			'new_item'           => esc_html__( 'New Service', 'redesigned-giggle' ),
			'edit_item'          => esc_html__( 'Edit Service', 'redesigned-giggle' ),
			'view_item'          => esc_html__( 'View Service', 'redesigned-giggle' ),
			'update_item'        => esc_html__( 'View Service', 'redesigned-giggle' ),
			'all_items'          => esc_html__( 'All Services', 'redesigned-giggle' ),
			'search_items'       => esc_html__( 'Search Services', 'redesigned-giggle' ),
			'parent_item_colon'  => esc_html__( 'Parent Service', 'redesigned-giggle' ),
			'not_found'          => esc_html__( 'No Services found', 'redesigned-giggle' ),
			'not_found_in_trash' => esc_html__( 'No Services found in Trash', 'redesigned-giggle' ),
			'name'               => esc_html__( 'Services', 'redesigned-giggle' ),
			'singular_name'      => esc_html__( 'Service', 'redesigned-giggle' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'page',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 6,
        'menu_icon'           => 'dashicons-admin-generic',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
			'page-attributes',
		],
		
		'rewrite' => true
	];

	register_post_type( 'service', $args );
}