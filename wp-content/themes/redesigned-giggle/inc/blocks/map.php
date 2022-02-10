<?php add_action('acf/init', 'my_acf_init_block_types_map');
function my_acf_init_block_types_map() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a banner block.
        acf_register_block_type(array(
            'name'              => 'map',
            'title'             => __('Google Map'),
            'description'       => __('Embed a Google Map'),
            'render_template'   => 'template-parts/blocks/map/map.php',
            'category'          => 'highlights',
            'icon'              => 'location-alt',
            'keywords'          => array( 'google', 'map', 'location' ),
        ));
    }
}