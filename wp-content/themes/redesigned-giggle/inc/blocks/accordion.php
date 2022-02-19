<?php add_action('acf/init', 'my_acf_init_block_types_accordion');
function my_acf_init_block_types_accordion() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a banner block.
        acf_register_block_type(array(
            'name'              => 'accordion',
            'title'             => __('Accordion'),
            'description'       => __('Display a list of contents in a collapsible accordion (e.g. FAQ)'),
            'render_template'   => 'template-parts/blocks/accordion/accordion.php',
            'category'          => 'tapestry',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Caret Up</title><path d="M414 321.94L274.22 158.82a24 24 0 00-36.44 0L98 321.94c-13.34 15.57-2.28 39.62 18.22 39.62h279.6c20.5 0 31.56-24.05 18.18-39.62z"/></svg>',
            'keywords'          => array( 'accordion', 'collapsible', 'faq' ),
        ));
    }
}

add_action('wp_enqueue_scripts','enqueue_if_block_is_present_accordion');

function enqueue_if_block_is_present_accordion(){
  if(is_singular()){
     //We only want the script if it's a singular page
     $id = get_the_ID();
     if(has_block('acf/accordion',$id)){
        wp_enqueue_script( 'accordion-script', get_stylesheet_directory_uri() . '/js/accordion.js', array(), '1.0.0', true );
     }
  }
}

