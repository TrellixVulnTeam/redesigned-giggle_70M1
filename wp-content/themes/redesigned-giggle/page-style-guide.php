<?php
/**
 * The template for displaying astyle guide
 *
 *
 * @link 
 *
 * @package Redesigned-Giggle
 */

get_header();
?>

	<main id="primary" class="site-main container">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		<section>
			<h2>Brand Identity</h2>
			<h3>Brand Colours</h3>
				<?php $brandColours = get_field('brand_colours', 'option');  ?>
			<ul>
				<li>Brand Color 1: <?php echo $brandColours['brand_colour_1']; ?></li>
				<li>Brand Color 2: <?php echo $brandColours['brand_colour_2']; ?></li>
				<li>Brand Color 3: <?php echo $brandColours['brand_colour_3']; ?></li>
				<li>Brand Color 4: <?php echo $brandColours['brand_colour_4']; ?></li>
			</ul>

			<h3>Background Colours</h3>
				<?php $bgColours = get_field('background_colours', 'option');  ?>
			<ul>
				<li>Background Color 1: 
					<span>
						<?php echo $bgColours['background_colour_1']['colour']; ?>
					</span>
					(uses <?php echo $bgColours['background_colour_1']['font_colour']; ?> font)
				</li>
				<li>
					Background Color 2: 
					<span>
						<?php echo $bgColours['background_colour_2']['colour']; ?>
					</span>
					(uses <?php echo $bgColours['background_colour_2']['font_colour']; ?> font)
				</li>
				<li>Background Color 3: 
					<span>
						<?php echo $bgColours['background_colour_3']['colour']; ?>
					</span>
					(uses <?php echo $bgColours['background_colour_3']['font_colour']; ?> font)
				</li>
			</ul>

			<h3>Typography</h3>
			<?php $typography = get_field('typography', 'option'); ?>
			<h4>Headings Font</h4>
			<p><?php echo $typography['fonts']['headings']['font'] ?></p>

			<h4>Body Font</h4>
			<p><?php echo $typography['fonts']['body']['font'] ?></p>

			<ul>
				<li><h1>Heading 1</h1></li>
				<li><h2>Heading 2</h2></li>
				<li><h3>Heading 3</h3></li>
				<li><h4>Heading 4</h4></li>
				<li><h5>Heading 5</h5></li>
				<li><p class="large">Large text<p></li>
				<li><p>Body text<p></li>
				<li><p class="small">Small text<p></li>
			</ul>
				
		</section>

	</main><!-- #main -->

<?php
get_footer();
