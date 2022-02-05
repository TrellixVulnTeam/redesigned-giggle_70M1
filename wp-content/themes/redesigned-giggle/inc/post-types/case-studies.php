<?php
add_action( 'init', 'redesigned_giggle_register_post_type_case_studies' );
function redesigned_giggle_register_post_type_case_studies() {
	$args = [
		'label'  => esc_html__( 'Case Studies', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Case Studies', 'redesigned-giggle' ),
			'name_admin_bar'     => esc_html__( 'Case Study', 'redesigned-giggle' ),
			'add_new'            => esc_html__( 'Add Case Study', 'redesigned-giggle' ),
			'add_new_item'       => esc_html__( 'Add new Case Study', 'redesigned-giggle' ),
			'new_item'           => esc_html__( 'New Case Study', 'redesigned-giggle' ),
			'edit_item'          => esc_html__( 'Edit Case Study', 'redesigned-giggle' ),
			'view_item'          => esc_html__( 'View Case Study', 'redesigned-giggle' ),
			'update_item'        => esc_html__( 'View Case Study', 'redesigned-giggle' ),
			'all_items'          => esc_html__( 'All Case Studies', 'redesigned-giggle' ),
			'search_items'       => esc_html__( 'Search Case Studies', 'redesigned-giggle' ),
			'parent_item_colon'  => esc_html__( 'Parent Case Study', 'redesigned-giggle' ),
			'not_found'          => esc_html__( 'No Case Studies found', 'redesigned-giggle' ),
			'not_found_in_trash' => esc_html__( 'No Case Studies found in Trash', 'redesigned-giggle' ),
			'name'               => esc_html__( 'Case Studies', 'redesigned-giggle' ),
			'singular_name'      => esc_html__( 'Case Study', 'redesigned-giggle' ),
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
		'menu_icon'           => 'dashicons-archive',
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

	register_post_type( 'case-study', $args );
}