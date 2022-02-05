<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Redesigned-Giggle
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

    <?php $brandColours = get_field('brand_colours', 'option');  ?>
    <?php $bgColours = get_field('background_colours', 'option');  ?>
    <?php $buttonStyling = get_field('button_styling', 'option');  ?>

	<?php 
		$typography = get_field('typography', 'option');
		$varaintListHeadings = [];
		$varaintListBody = [];

		$brandIdentity = get_field('identity', 'option');

		if ($typography['fonts']['headings']['variants']) : 
			foreach ($typography['fonts']['headings']['variants'] as $variant) : ?>
				<?php // Sort font wieghts and remove gubbins 
				if (1 === preg_match('~[0-9]~', $variant)) {
					if(strpos($variant, 'italic') !== false){
						$variant = str_replace('italic', '', $variant);
						$variant = '1,' . $variant;
					} else {
						$variant = '0,' . $variant;
					}
					array_push($varaintListHeadings, $variant);
				} else {
					if ($variant === 'regular') {
						array_push($varaintListHeadings, '0,400');
					} elseif ($variant === 'italic') {
						array_push($varaintListHeadings, '1,400');
					}
					// 
				}
			endforeach; 
		endif;
		sort($varaintListHeadings);

		foreach ($typography['fonts']['body']['variants'] as $variant) : ?>
			<?php // Sort font wieghts and remove gubbins 
			if (1 === preg_match('~[0-9]~', $variant)) {
				if(strpos($variant, 'italic') !== false){
					$variant = str_replace('italic', '', $variant);
					$variant = '1,' . $variant;
				} else {
					$variant = '0,' . $variant;
				}
				array_push($varaintListBody, $variant);
			} else {
				if ($variant === 'regular') {
					array_push($varaintListBody, '0,400');
				} elseif ($variant === 'italic') {
					array_push($varaintListBody, '1,400');
				}
				// 
			}
		endforeach; 
		sort($varaintListBody); ?>

	<?php 
	require_once get_template_directory() . '/vendor/Mexitek/PHPColors/src/Mexitek/PHPColors/Color.php';

	use Mexitek\PHPColors\Color;

	$brandColorOne = new Color($brandColours['brand_colour_1']);
	$brandColorOneLight = $brandColorOne->lighten();
	$brandColorOneDark = $brandColorOne->darken();
	$brandColorOneShade = $brandColorOne->isDark() ? $brandColorOneLight : $brandColorOneDark;

	$brandColorTwo = new Color($brandColours['brand_colour_2']);
	$brandColorTwoLight = $brandColorTwo->lighten();
	$brandColorTwoDark = $brandColorTwo->darken();
	$brandColorTwoShade = $brandColorTwo->isDark() ? $brandColorTwoLight : $brandColorTwoDark;

	$brandColorThree = new Color($brandColours['brand_colour_3']);
	$brandColorThreeLight = $brandColorThree->lighten();
	$brandColorThreeDark = $brandColorThree->darken();
	$brandColorThreeShade = $brandColorThree->isDark() ? $brandColorThreeLight : $brandColorThreeDark;

	$brandColorFour = new Color($brandColours['brand_colour_4']);
	$brandColorFourLight = $brandColorFour->lighten();
	$brandColorFourDark = $brandColorFour->darken();
	$brandColorFourShade = $brandColorFour->isDark() ? $brandColorFourLight : $brandColorFourDark;

	$fontColBright = "#fff";
	$fontColDark = "#000";

	$bgColOne = new Color($bgColours['background_colour_1']['colour']);
	$bgColOneShade = $bgColOne->isDark() ? $bgColOne->lighten() : $bgColOne->darken();
	$bgColOneTextCol = $bgColOne->isDark() ? $fontColBright : $fontColDark;

	$bgColTwo = new Color($bgColours['background_colour_2']['colour']);
	$bgColTwoShade = $bgColTwo->isDark() ? $bgColTwo->lighten() : $bgColTwo->darken();
	$bgColTwoTextCol = $bgColTwo->isDark() ? $fontColBright : $fontColDark;
	// echo $bgColTwo . $bgColTwoTextCol;

	$bgColThree = new Color($bgColours['background_colour_3']['colour']);
	$bgColThreeShade = $bgColThree->isDark() ? $bgColThree->lighten() : $bgColThree->darken();
	$bgColThreeTextCol = $bgColThree->isDark() ? $fontColBright : $fontColDark;
	?>

    <style>
        :root {
            --brand-color-1: <?php echo $brandColorOne; ?>;
			--brand-color-1--light: #<?php echo $brandColorOneLight; ?>;
			--brand-color-1--dark: #<?php echo $brandColorOneDark; ?>;
			--brand-color-1--shade: #<?php echo $brandColorOneShade; ?>;

			--brand-color-2: <?php echo $brandColorTwo; ?>;
			--brand-color-2--light: #<?php echo $brandColorTwoLight; ?>;
			--brand-color-2--dark: #<?php echo $brandColorTwoDark; ?>;
			--brand-color-2--shade: #<?php echo $brandColorTwoShade; ?>;

			--brand-color-3: <?php echo $brandColorThree; ?>;
			--brand-color-3--light: #<?php echo $brandColorThreeLight; ?>;
			--brand-color-3--dark: #<?php echo $brandColorThreeDark; ?>;
			--brand-color-3--shade: #<?php echo $brandColorThreeShade; ?>;

			--brand-color-4: <?php echo $brandColorFour; ?>;
			--brand-color-4--light: #<?php echo $brandColorFourLight; ?>;
			--brand-color-4--dark: #<?php echo $brandColorFourDark; ?>;
			--brand-color-4--shade: #<?php echo $brandColorFourShade; ?>;

			--font-color--bright: <?php echo $typography['font_colours']['bright'] ?>;
			--font-color--dark: <?php echo $typography['font_colours']['dark'] ?>;

			--bg-color-1: <?php echo $bgColOne ?>;
			--bg-color-1--shade: #<?php echo $bgColOneShade ?>;
			--bg-color-2: <?php echo $bgColTwo ?>;
			--bg-color-2--shade: #<?php echo $bgColTwoShade ?>;
			--bg-color-3: <?php echo $bgColThree ?>;
			--bg-color-3--shade: #<?php echo $bgColThreeShade ?>;
			
			--bg-color-1--font-color: <?php echo $bgColOneTextCol ?>;
			--bg-color-2--font-color: <?php echo $bgColTwoTextCol ?>;
			--bg-color-3--font-color: <?php echo $bgColThreeTextCol ?>;
			
			--bg-color-1--link-color: <?php echo $bgColours['background_colour_1']['font_colour'] === 'dark' ? $typography['font_colours']['dark'] : $typography['font_colours']['bright']; ?>;
			--bg-color-2--link-color: <?php echo $bgColours['background_colour_2']['font_colour'] === 'dark' ? $typography['font_colours']['dark'] : $typography['font_colours']['bright']; ?>;
			--bg-color-3--link-color: <?php echo $bgColours['background_colour_3']['font_colour'] === 'dark' ? $typography['font_colours']['dark'] : $typography['font_colours']['bright']; ?>;
			
			--font-family--headings: <?php echo $typography['fonts']['headings']['font'] ?>, sans-serif;
			--font-family--body: <?php echo $typography['fonts']['body']['font'] ?>, sans-serif;
        }

        body {
            background-color: var(--bg-color-1);
        }
    </style>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=<?= $typography['fonts']['headings']['font'] ?>:<?php if (in_array("italic", $typography['fonts']['headings']['variants'])) : ?>ital<?php endif; ?>,wght@<?php foreach ($varaintListHeadings as $key => $variant) { echo $key !== array_key_last($varaintListHeadings) ? $variant . ';' : $variant; } ?>&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=<?= $typography['fonts']['body']['font'] ?>:<?php if (in_array("italic", $typography['fonts']['body']['variants'])) : ?>ital<?php endif; ?>,wght@<?php foreach ($varaintListBody as $key => $variant) { echo $key !== array_key_last($varaintListBody) ? $variant . ';' : $variant; } ?>&display=swap" rel="stylesheet">
	
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'redesigned-giggle' ); ?></a>

	<?php $noticeBar = get_field('notice_bar', 'option'); 
	
		if ($noticeBar['show_notice_bar']) :?>
			<header class="notice-bar bg-<?php echo $noticeBar['appearance']['background_colour']; ?>">
				<div class="notice-bar__inner container container--xs">
					<ion-icon class="" name="<?php echo $noticeBar['appearance']['icon']; ?>"></ion-icon>
					<span class="small"><?php echo $noticeBar['appearance']['content']; ?></span>
					<button class="bg-<?php echo $noticeBar['appearance']['background_colour']; ?> close-notice-bar">
						<span class="screen-reader-text">Close</span>
						<ion-icon name="close-outline"></ion-icon>
					</button>
				</div>
			</header>
		<?php endif; ?>

	<?php $header = get_field('appearance', 'option'); ?>
	<header id="masthead" class="site-header bg-<?php echo $header['background_colour']; ?>">
		<div class="site-header__inner container container--xs">
			<div class="site-branding">
				<?php
				if (!$brandIdentity['logo']) {
					the_custom_logo();
				} else {
					echo '<a href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img 
						src="' . $brandIdentity['logo']['url'] . '" alt="' . ($brandIdentity['site_title'] ? $brandIdentity['site_title'] : get_bloginfo( 'name' )) . '"></a>';
				}

				if ($header['show_title_beside_logo'] || !$brandIdentity['logo']) : 
					if ( is_front_page() && is_home() ) :
						?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php if (!$brandIdentity['site_title']) : ?>
								<?php bloginfo( 'name' ); ?>
							<?php else: ?>
								<?php echo $brandIdentity['site_title']; ?>
							<?php endif; ?>
						</a></h1>
						<?php
					else :
						?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
							<?php if (!$brandIdentity['site_title']) : ?>
								<?php bloginfo( 'name' ); ?>
							<?php else: ?>
								<?php echo $brandIdentity['site_title']; ?>
							<?php endif; ?>
						</a></p>
						<?php
					endif; 
				endif; ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'redesigned-giggle' ); ?></button>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
				<?php if ($buttons = get_field('header_ctas', 'option')['buttons']) {
					require get_template_directory() . '/template-parts/components/buttons.php';
				} ?>
			</nav><!-- #site-navigation -->
		</div>
	</header><!-- #masthead -->
	
	<?php if ($header['mode'] === 'extended') : ?>
		<header class="extended-header bg-<?php echo $header['utility_strip']['background_colour'] ?>">
			<div class="extended-header__inner container container--np">
				<!-- <button class="search-button strip-button"><ion-icon name="search-outline"></ion-icon><span>Search this site</span></button> -->
				<?php get_search_form(); ?>
				
				<?php if ($header['show_contact_details']) : ?>
					<ul class="small-up header-contact container-sup container-sup--xs">
						<?php $headerContact = get_field('contact_details', 'option')['contact_details']; ?>
						<li><ion-icon class="large" name="call-outline"></ion-icon> <span class="small"><?php echo $headerContact['telephone_number']; ?></span></li>
						<li><ion-icon class="large" name="mail-outline"></ion-icon> <span class="small"><?php echo $headerContact['email_address']; ?></span></li>
					</ul>
				<?php endif; ?>
			</div>
		</header>
	<?php endif; ?>