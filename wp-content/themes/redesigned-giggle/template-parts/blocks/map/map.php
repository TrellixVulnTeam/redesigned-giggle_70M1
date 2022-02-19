<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

if (isset($block)) :
// Create id attribute allowing for custom "anchor" value.
$id = 'map-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'map';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
};

if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
};

$bgCol = get_field('background_colour');

else :
    $className = 'map';
    $id = 'event-map';
    $bgCol = '2';
endif;
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo $bgCol; ?>">
<?php if (get_field('show_details') || (isset($showDetails) && $showDetails === 1)) : ?>
    <div class="map__inner grid container container--<?php echo get_field('block_spacing') ? get_field('block_spacing') : 'xl' ; ?>">
<?php endif; ?>
    <?php 
    $location = get_field('map_location');
    if( $location ): ?>
        <div class="<?php echo get_field('show_details') || (isset($showDetails) && $showDetails === 1) ? 'col colspan-8' : ''; ?>">
	        <?php require get_template_directory() . '/template-parts/blocks/map/google-map.php'; ?>
        </div>
    <?php endif; ?>
<?php if (get_field('show_details') || (isset($showDetails) && $showDetails === 1)) : ?>
    <div class="col colspan-4">
        <h2>Address</h2>
            <div class="map__location">
                <span class="large">
                <?php 
                    $iconName = 'location';
                    require get_template_directory() . '/template-parts/components/icon.php'; ?>
                </span>
                <p class="large">
                    <span><?php echo isset($location['street_number']) ? $location['street_number'] : ''; ?></span>
                    <span><?php echo isset($location['street_name']) ? $location['street_name'] . '<br>' : ''; ?></span>
                    <span><?php echo isset($location['city']) ? $location['city'] . '<br>' : ''; ?></span>
                    <span><?php echo isset($location['state']) ? $location['state'] . '<br>' : ''; ?></span>
                    <span><?php echo isset($location['post_code']) ? $location['post_code'] . '<br>' : ''; ?></span>
                    <span><?php echo isset($location['country']) ? $location['country'] : ''; ?></span>
                </p>
            </div>
            <?php if (get_field('contact_details')) : ?>
                <p class="map__contact">
                    <span class="large">
                    <?php 
                        $iconName = 'call';
                        require get_template_directory() . '/template-parts/components/icon.php'; ?>
                    </span>
                    <?php echo get_field('contact_details')['telephone_number']; ?></p>
                <p class="map__contact">
                    <span class="large">
                    <?php 
                        $iconName = 'mail';
                        require get_template_directory() . '/template-parts/components/icon.php'; ?>
                    </span> 
                    <?php echo get_field('contact_details')['email_address']; ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
</section>