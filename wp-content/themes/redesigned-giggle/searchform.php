<?php $header = get_field('appearance', 'option'); ?>

<form class="site-search" id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <span class="search-icon"><ion-icon class="search-icon__icon large" name="search-outline"></ion-icon></span>
    <input type="text" class="small bg-<?php echo $header['utility_strip']['background_colour'] ?> search-field" name="s" placeholder="Search this site" value="<?php echo get_search_query(); ?>">
    <button type="submit" class="input-button" form="searchform" value="Submit">
        <ion-icon class="arrow-icon large" name="arrow-forward-outline"></ion-icon>
        <span class="screen-reader-text">Search</span>
    </button>

</form>