<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'banner-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$blockData = [
    'banner' => get_field('banner')
];

$isSlider = count($blockData['banner']) > 1 ? true : false

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="banner__inner <?php echo $isSlider ? 'swiper swiper-' . $block['id'] : ''; ?>">
        <?php if( $blockData['banner'] ) : ?>
            <ul class="banner-list <?php echo $isSlider ? 'swiper-wrapper' : ''; ?>">
                <?php foreach( $blockData['banner'] as $banner ) : ?>
                    <li class="banner-list__item <?php echo $isSlider ? 'swiper-slide' : ''; ?> bg-<?php echo $banner['background_colour'] ? $banner['background_colour'] : ''; ?>" style="background-image: url('<?php echo $banner['background_image'] ? $banner['background_image']['url'] : ''; ?>');">
                    <?php 
                        // $bgStyle = get_field('background_colours', 'option')['background_colour_' . $banner['background_colour']]['font_colour'] === 'bright' ? 'bg-dark' : '' ?>
                        <div class="container container--<?php echo get_field('block_spacing'); ?>">
                            <?php if ($title = $banner['main_title']) : ?><h2 class="xlarge"><?php echo $banner['main_title']; ?></h2><?php endif; ?>
                            <?php if ($subtitle = $banner['subtitle']) : ?><h3 class="large"><?php echo $subtitle; ?></h3><?php endif; ?>
                            <?php if ($content = $banner['content']) : ?><p class="large"><?php echo $content; ?></p><?php endif; ?>
                            <?php if ($buttons = $banner['buttons']) {
                                require get_template_directory() . '/template-parts/components/buttons.php';
                            } ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php if ($isSlider) : ?>
                <div class="swiper-pagination"></div>
                <script>
                    // getComputedStyle(document.documentElement).getPropertyValue('--brand-color-1')
                    var swiper = new Swiper(".swiper-<?php echo $block['id']; ?>", {
                        pagination: {
                            el: ".swiper-pagination",
                            type: "<?php echo get_field('slider_settings')['pagination_style'] ?>",
                        },
                    });
                </script>
            <?php endif; ?>
        <?php endif; ?>
        <style type="text/css">
            #<?php echo $id; ?> .swiper-pagination-progressbar-fill,
            #<?php echo $id; ?> .swiper-pagination-bullet-active {
                /*css here */
                background-color: var(--brand-color-<?php echo get_field('slider_settings')['pagination_colour'] ?>);
            }
        </style>
    </div>
</section>