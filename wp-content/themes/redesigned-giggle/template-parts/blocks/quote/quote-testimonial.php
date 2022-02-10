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
$id = 'quote-testimonial-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'quote-testimonial';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$blockData = [
    'title' => get_field('title') ? get_field('title') : null,
    'quote' => get_field('quote__testimonial') ? get_field('quote__testimonial') : null
];

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="quote-testimonial__inner container container--<?php echo get_field('block_spacing'); ?>">
        <?php if ($blockData['title']) : ?>
            <h2><?php echo $blockData['title']; ?></h2>
        <?php endif; ?>
        <?php if ($blockData['quote']) : ?>
            <div class="quote-testimonial__list <?php echo count($blockData['quote']) > 1 ? 'grid' : '' ?> ">
                <?php foreach ($blockData['quote'] as $quote) : ?>
                    <div class="quote-testimonial__content <?php echo count($blockData['quote']) > 1 ? 'col colspan-6' : 'container container--xs' ?>">
                        <blockquote class="quote-testimonial__blockquote large" cite="<?php echo $quote['citation']; ?>">
                            <?php echo $quote['text_content']; ?>
                        </blockquote>
                        <cite>
                            - <?php echo $quote['author']; ?> | <?php echo $quote['authors_role__company']; ?>
                        </cite>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>