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
$id = 'logo-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'logo-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$blockData = [
    'title' => get_field('title') ? get_field('title') : null,
    'logos' => get_field('logos') ? get_field('logos') : null
];

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="logo-block__inner container container--<?php echo get_field('block_spacing'); ?>">
        <?php if ($blockData['title']) : ?>
            <h2><?php echo $blockData['title']; ?></h2>
        <?php endif; ?>
        <?php if ($blockData['logos']) : ?>
            <ul class="logo-list">
                <?php foreach ($blockData['logos'] as $logo) : ?>
                    <?php 
                        $imageAlt = get_post_meta($logo['image']['ID'], '_wp_attachment_image_alt', true); 
                        $imageUrl = wp_get_attachment_url($logo['image']['ID'], 'redesigned-giggle-270-270' ); ?>
                        <li class="logo-list__image">
                            <?php require get_template_directory() . '/template-parts/components/image.php'; ?>
                        </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</section>