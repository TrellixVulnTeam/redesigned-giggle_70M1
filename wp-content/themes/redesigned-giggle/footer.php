<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Redesigned-Giggle
 */

?>
<?php $footer = get_field('footer_appearance', 'option'); ?>

	<footer id="colophon" class="site-footer bg-<?php echo $footer['background_colour'] ?>">
		<div class="site-footer__inner container">
			<div class="site-info">
					<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( '%1$s by %2$s.', 'redesigned-giggle' ), 'Tapestry', '<a href="https://thread-digital.co.uk/">Thread Digital</a>' );
					?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
