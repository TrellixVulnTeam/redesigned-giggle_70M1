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
$id = 'staff-grid-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'staff-grid';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="staff-grid__inner container container--<?php echo get_field('block_spacing'); ?>">
        <?php if ($title = get_field('title')) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($description = get_field('description')) : ?>
            <p class="large"><?php echo $description; ?></p>
        <?php endif; ?>
        <?php $postType = 'staff';
            $postsToShow = -1;
            $cardStyle = 'staff';
            $showButton = false;
            require get_template_directory() . '/template-parts/post-grid.php';  ?>
    </div>
</section>