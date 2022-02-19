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
$id = 'form-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'form';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

if (get_field('wpform')) { 
    $form = get_field('wpform');
    $formType = 'wpform';
} elseif (get_field('contact_form_7')) {
    $form = get_field('contact_form_7');
    $formType = 'cf7';
} else {
    $form = get_field('gform');
    $formType = 'gform';
}
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="form__inner container container--<?php echo get_field('block_spacing'); ?>">
        <?php if ($title = get_field('title')) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($description = get_field('description')) : ?>
            <p class="large"><?php echo $description; ?></p>
        <?php endif; ?>
        <?php //var_dump($form); ?>
        <?php if ($formType === 'wpform') : ?>
            <?php echo do_shortcode('[wpforms id="' . $form .'"]') ?>
        <?php elseif ($formType ==='cf7') : ?>
            <?php echo do_shortcode('[contact-form-7 id="' . $form .'"]') ?>
        <?php else : ?>
            <?php echo get_field('gform'); ?>
        <?php endif; ?>
    </div>
</section>