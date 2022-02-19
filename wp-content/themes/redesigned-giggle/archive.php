<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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
				'main_title' => get_the_archive_title(),
				'background' => array(
					'background_colour' => '3'
				),
				'content' => get_the_archive_description()
				));
			
			require get_template_directory() . '/template-parts/blocks/banners/banner.php'; ?>

			</header><!-- .entry-header container -->

			
		<div class="entry-content container">
				<ul class="grid post-grid ">
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

							<?php 
							if ( is_post_type_archive( 'staff' ) ) {
								// Do stuff
								$cardStyle = 'natural';
						   }
							require get_template_directory() . '/template-parts/post-card.php'; ?>
					
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
