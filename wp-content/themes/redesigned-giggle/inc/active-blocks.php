<?php 
/**
 * This file dictates which blocks are available to edit in the gutenburg editor
 */

add_filter( 'allowed_block_types', 'redesigned_giggle_allowed_block_types' );
 
function redesigned_giggle_allowed_block_types( $allowed_blocks ) {
 
	return array(
		'core/image',
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/shortcode',
		'core/table',
		'core/code',
		'core/html',
		'core/preformatted',
		'acf/call-to-action',
		'acf/highlighted-content',
		'acf/logos',
		'acf/quote-testimonial',
		'acf/banner',
		'acf/trustpilot',
		'acf/map',
		'acf/share-page',
		'acf/accordion',
		'acf/form',
		'acf/image-gallery',
		'acf/price-list',
		'acf/services',
		'acf/stats',
		'acf/download',
		'acf/staff',
		'acf/media-text'
	);
 
}