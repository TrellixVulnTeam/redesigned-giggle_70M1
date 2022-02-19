<?php add_action('acf/init', 'my_acf_init_block_types_share_page');
function my_acf_init_block_types_share_page() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a banner block.
        acf_register_block_type(array(
            'name'              => 'share-page',
            'title'             => __('Share this Page'),
            'description'       => __('Add social media sharing links.'),
            'render_template'   => 'template-parts/blocks/sharing/share-this-page.php',
            'category'          => 'tapestry',
            'icon'              => 'share',
            'keywords'          => array( 'social', 'share'),
        ));
    }
}