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
$id = 'cta-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'call-to-action';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$blockData = [
    'heading' => get_field('cta-content')['cta-text']['cta-heading'],
    'description' => get_field('cta-content')['cta-text']['cta-description'],
    'image' => get_field('cta-content')['cta-image'],
    'buttons' => get_field('buttons'),
    'background' => get_field('background')
];

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="container">
        <h2><?= $blockData['heading'] ?></h2>
        <?php if ($blockData['description']) : ?>
            <p><?php echo $blockData['description']; ?></p> 
        <?php endif; ?>

            <img src="<?php echo $blockData['image']['url']; ?>" alt="" />

        <?php if ($buttons = $blockData['buttons']) {
            require get_template_directory() . '/template-parts/components/buttons.php';
        } ?>
        <style type="text/css">
            #<?php echo $id; ?> {
                /*css here */
            }
        </style>
    </div>
</section>