<?php add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'call-to-action',
            'title'             => __('Call-to-Action'),
            'description'       => __('Direct users with a call-to-action'),
            'render_template'   => 'template-parts/blocks/call-to-action/call-to-action.php',
            'category'          => 'highlights',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'cta', 'button' ),
        ));
    }
}