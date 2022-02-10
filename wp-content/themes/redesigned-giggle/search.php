<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Redesigned-Giggle
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="entry-header">
			<?php
			
			$blockData['banner'] = array(array(
				'main_title' => 'Search Results',
				'content' => 'Searching for "' . get_search_query() . '"',
				'background' => array(
					'background_colour' => '3'
				),
				));
			
			require get_template_directory() . '/template-parts/blocks/banners/banner.php'; ?>

			<div class="entry-content container">
				<ul class="grid post-grid">
					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/ ?>
						<li class="col colspan-4">

							<?php require get_template_directory() . '/template-parts/post-card.php'; ?>
					
						</li>

					<?php endwhile; ?>
				</ul>
				<?php the_posts_navigation(); ?>
			</div>
		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
