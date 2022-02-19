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
$id = 'media-text-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'media-text';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="media-text__inner container container--<?php echo get_field('block_spacing'); ?> grid">
        <div class="col colspan-5">
            <?php if (get_field('media')['type'] === 'image') : ?>
            <?php 
            $image = get_field('media')['image'];
            $imageAlt = get_post_meta($image['ID'], '_wp_attachment_image_alt', true); 
            $imageUrl = $image['sizes']['redesigned-giggle-522-286']; ?>
            <div>
                <?php require get_template_directory() . '/template-parts/components/image.php'; ?>
            </div>
            <?php elseif (get_field('media')['type'] === 'youtube') : ?>
                <?php echo get_field('media')['embed']; ?>
            <?php endif; ?>
        </div>
        <div class="call-to-action__content col colspan-7 <?php echo get_field('media')['position'] === 'right' ? 'reverse' : ''; ?>">
            <?php if ($title = get_field('title')) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($description = get_field('description')) : ?>
                <p class="large"><?php echo $description; ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>