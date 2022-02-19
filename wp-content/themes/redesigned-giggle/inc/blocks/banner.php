<?php add_action('acf/init', 'my_acf_init_block_types_banner');
function my_acf_init_block_types_banner() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a banner block.
        acf_register_block_type(array(
            'name'              => 'banner',
            'title'             => __('Banner'),
            'description'       => __('Create a promotional banner or slider'),
            'render_template'   => 'template-parts/blocks/banners/banner.php',
            'category'          => 'tapestry',
            'icon'              => 'align-full-width',
            'keywords'          => array( 'slider', 'banner', 'hero', 'promotion' ),
        ));
    }
}