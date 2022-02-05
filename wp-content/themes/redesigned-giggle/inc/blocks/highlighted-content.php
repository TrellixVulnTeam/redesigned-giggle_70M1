<?php add_action('acf/init', 'my_acf_init_block_types_highlighted_content');
function my_acf_init_block_types_highlighted_content() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a highlighted content block.
        acf_register_block_type(array(
            'name'              => 'highlighted-content',
            'title'             => __('Highlighted Content'),
            'description'       => __('Display a collection of content items (posts, jobs etc)'),
            'render_template'   => 'template-parts/blocks/highlighted-content/highlighted-content.php',
            'category'          => 'highlights',
            'icon'              => 'excerpt-view',
            'keywords'          => array( 'latest', 'recent', 'highlighted', 'posts' ),
        ));
    }
}