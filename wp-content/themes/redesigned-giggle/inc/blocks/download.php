<?php add_action('acf/init', 'my_acf_init_block_types_download');
function my_acf_init_block_types_download() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a banner block.
        acf_register_block_type(array(
            'name'              => 'download',
            'title'             => __('Download'),
            'description'       => __('Embed a downloadable file'),
            'render_template'   => 'template-parts/blocks/download/download.php',
            'category'          => 'tapestry',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Download</title><path d="M376 160H272v153.37l52.69-52.68a16 16 0 0122.62 22.62l-80 80a16 16 0 01-22.62 0l-80-80a16 16 0 0122.62-22.62L240 313.37V160H136a56.06 56.06 0 00-56 56v208a56.06 56.06 0 0056 56h240a56.06 56.06 0 0056-56V216a56.06 56.06 0 00-56-56zM272 48a16 16 0 00-32 0v112h32z"/></svg>',
            'keywords'          => array( 'download', 'file', 'upload' ),
        ));
    }
}