<?php add_action('acf/init', 'my_acf_init_block_types_logos_block');
function my_acf_init_block_types_logos_block() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a banner block.
        acf_register_block_type(array(
            'name'              => 'logos',
            'title'             => __('Logos Block'),
            'description'       => __('Display a selection of logos (eg. clients, partners or awards)'),
            'render_template'   => 'template-parts/blocks/logos/logo-block.php',
            'category'          => 'highlights',
            'icon'              => 'nametag',
            'keywords'          => array( 'logos', 'partners', 'clients'),
        ));
    }
}