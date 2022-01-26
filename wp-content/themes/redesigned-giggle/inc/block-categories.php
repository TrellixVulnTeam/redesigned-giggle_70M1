<?php	
/**
 * Adding a new (custom) block category.
 *
 * @param   array $block_categories                         Array of categories for block types.
 * @param   WP_Block_Editor_Context $block_editor_context   The current block editor context.
 */
function wpdocs_add_new_block_category( $block_categories, $block_editor_context ) {
    // You can add extra validation such as seeing which post type
    // is used to only include categories in some post types.
    // if ( in_array( $block_editor_context->post->post_type, ['post', 'my-post-type'] ) ) { ... }
 
    return array_merge(
        $block_categories,
        [
            [
                'slug'  => 'highlights',
                'title' => esc_html__( 'Highlights', 'highlights' ),
                'icon'  => 'admin-appearance', // Slug of a WordPress Dashicon or custom SVG
            ],
        ]
    );
}
 
add_filter( 'block_categories_all', 'wpdocs_add_new_block_category', 10, 2 );