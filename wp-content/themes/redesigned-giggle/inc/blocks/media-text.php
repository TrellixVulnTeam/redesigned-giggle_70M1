<?php add_action('acf/init', 'my_acf_init_block_types_media_text');
function my_acf_init_block_types_media_text() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a banner block.
        acf_register_block_type(array(
            'name'              => 'media-text',
            'title'             => __('Media & Text'),
            'description'       => __('Display an image or video alongside text'),
            'render_template'   => 'template-parts/blocks/content/media-text.php',
            'category'          => 'tapestry',
            'icon'              => 'align-pull-left',
            'keywords'          => array( 'media', 'image', 'video', 'text' ),
        ));
    }
}