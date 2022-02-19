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
$id = 'gallery-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'gallery';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$images = get_field('images');
$mode = get_field('gallery_settings')['mode'];
$columns = get_field('gallery_settings')['columns'];

if ($mode === 'slider') {
    $sliderSettings = get_field('slider_settings')['slider_settings'];
}

$isSlider = $mode === 'slider' ? true : false;
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="gallery__inner container container--<?php echo get_field('block_spacing'); ?>">
        <?php if ($title = get_field('title')) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($description = get_field('description')) : ?>
            <p class="large"><?php echo $description; ?></p>
        <?php endif; ?>
        <div class="image-list-wrap <?php echo $isSlider ? 'swiper swiper-' . $block['id'] : ''; ?>">
            <ul class="image-list <?php echo $isSlider ? 'swiper-wrapper' : 'grid'; ?>">
                <?php foreach( $images as $image ) : ?>
                    <?php 
                        $imageAlt = get_post_meta($image['image']['ID'], '_wp_attachment_image_alt', true); 
                        $imageUrl = $image['image']['sizes']['redesigned-giggle-522-286']; ?>
                    <li class="image-list__item <?php echo $isSlider ? 'swiper-slide' : 'col colspan-' . (12 / $columns); ?>">
                        <div>
                            <?php require get_template_directory() . '/template-parts/components/image.php'; ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php if ($isSlider) : ?>
            <div class="swiper-pagination"></div>
            <script>
                // getComputedStyle(document.documentElement).getPropertyValue('--brand-color-1')
                var swiper = new Swiper(".swiper-<?php echo $block['id']; ?>", {
                    slidesPerView: <?php echo $columns; ?>,
                    spaceBetween: 30,
                    pagination: {
                        el: ".swiper-pagination",
                        type: "<?php echo $sliderSettings['pagination_style'] ?>",
                    },
                });
            </script>
        <?php endif; ?>
    </div>
    </div>
</section>