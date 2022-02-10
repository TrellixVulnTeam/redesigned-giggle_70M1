<?php add_action('acf/init', 'my_acf_init_block_types_trustpilot');
function my_acf_init_block_types_trustpilot() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a banner block.
        acf_register_block_type(array(
            'name'              => 'trustpilot',
            'title'             => __('Trustpilot Reviews'),
            'description'       => __('Add a Trustpilot widget.'),
            'render_template'   => 'template-parts/blocks/integrations/trustpilot.php',
            'category'          => 'highlights',
            'icon'              => 'star-filled',
            'keywords'          => array( 'reviews', 'trustpilot', 'feefo' ),
        ));
    }
}