<?php add_action('acf/init', 'my_acf_init_block_types_quote_testimonial');
function my_acf_init_block_types_quote_testimonial() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a banner block.
        acf_register_block_type(array(
            'name'              => 'quote-testimonial',
            'title'             => __('Quote / Testimonials'),
            'description'       => __('Show a single quote or selection of testimonials'),
            'render_template'   => 'template-parts/blocks/quote/quote-testimonial.php',
            'category'          => 'tapestry',
            'icon'              => 'format-quote',
            'keywords'          => array( 'quote', 'testimonial', 'review'),
        ));
    }
}