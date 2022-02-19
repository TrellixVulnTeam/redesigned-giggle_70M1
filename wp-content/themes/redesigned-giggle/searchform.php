<?php $header = get_field('appearance', 'option'); ?>

<form class="site-search" id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <span class="search-icon large">
	<?php 
		$iconName = 'search';
		require get_template_directory() . '/template-parts/components/icon.php'; ?>
    </span>
    <input type="text" class="small bg-<?php echo $header['utility_strip']['background_colour'] ?> search-field" name="s" placeholder="Search this site" value="<?php echo get_search_query(); ?>">
    <button type="submit" class="input-button" form="searchform" value="Submit">
        <span class="arrow-icon large">
        <?php 
            $iconName = 'arrow-forward';
            require get_template_directory() . '/template-parts/components/icon.php'; ?>
        </span>
        <span class="screen-reader-text">Search</span>
    </button>

</form>