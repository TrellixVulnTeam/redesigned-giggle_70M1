<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Redesigned-Giggle
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<header class="entry-header">
	<?php
		$eventStart = get_field('event_details')['event_times']['start_time'];
		$eventEnd = get_field('event_details')['event_times']['end_time'] ? get_field('event_details')['event_times']['end_time'] : NULL;

		if ($eventEnd) {
			$eventTimes = $eventStart . " - " . $eventEnd;
		} else {
			$eventTimes = $eventStart;
		}
	
	$imageUrl = get_the_post_thumbnail_url(get_the_ID(), 'redesigned-giggle-1920-600' );
// var_dump($imageUrl);
	$blockData['banner'] = array(array(
		'main_title' => get_the_title(),
		'background' => array(
			'background_image' => array(
				'url' => $imageUrl
			),
			'background_colour' => '2'
		),
		'content' => $eventTimes
		));
	
	require get_template_directory() . '/template-parts/blocks/banners/banner.php'; ?>
	
	<?php 
    $location = get_field('map_location');
	$showDetails = 1;

    if( $location ): ?>
        <div class="<?php echo get_field('show_details') ? 'col colspan-8' : ''; ?>">
	        <?php require get_template_directory() . '/template-parts/blocks/map/map.php'; ?>
        </div>
    <?php endif; ?>
	</header><!-- .entry-header container -->

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'redesigned-giggle' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'redesigned-giggle' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer container">
		<?php redesigned_giggle_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->