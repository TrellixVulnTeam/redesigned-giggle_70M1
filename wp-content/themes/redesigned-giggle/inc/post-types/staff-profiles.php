<?php
add_action( 'init', 'redesigned_giggle_register_post_type_staff_profiles' );
function redesigned_giggle_register_post_type_staff_profiles() {
	$hasArchive = get_field('staff_profiles_settings', 'option') ? true : false;
	$args = [
		'label'  => esc_html__( 'Staff Profiles', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Staff Profiles', 'redesigned-giggle' ),
			'name_admin_bar'     => esc_html__( 'Staff Profile', 'redesigned-giggle' ),
			'add_new'            => esc_html__( 'Add Staff Profile', 'redesigned-giggle' ),
			'add_new_item'       => esc_html__( 'Add new Staff Profile', 'redesigned-giggle' ),
			'new_item'           => esc_html__( 'New Staff Profile', 'redesigned-giggle' ),
			'edit_item'          => esc_html__( 'Edit Staff Profile', 'redesigned-giggle' ),
			'view_item'          => esc_html__( 'View Staff Profile', 'redesigned-giggle' ),
			'update_item'        => esc_html__( 'View Staff Profile', 'redesigned-giggle' ),
			'all_items'          => esc_html__( 'All Staff Profiles', 'redesigned-giggle' ),
			'search_items'       => esc_html__( 'Search Staff Profiles', 'redesigned-giggle' ),
			'parent_item_colon'  => esc_html__( 'Parent Staff Profile', 'redesigned-giggle' ),
			'not_found'          => esc_html__( 'No Staff Profiles found', 'redesigned-giggle' ),
			'not_found_in_trash' => esc_html__( 'No Staff Profiles found in Trash', 'redesigned-giggle' ),
			'name'               => esc_html__( 'Staff Profiles', 'redesigned-giggle' ),
			'singular_name'      => esc_html__( 'Staff Profile', 'redesigned-giggle' ),
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
		'has_archive'         => $hasArchive,
		'publicly_queryable'  => $hasArchive,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 7,
		'menu_icon'           => 'dashicons-admin-users',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
		],
		
		'rewrite' => true
	];

	register_post_type( 'staff', $args );
}