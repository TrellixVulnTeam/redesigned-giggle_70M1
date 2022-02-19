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
$id = 'accordion-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$accordionItems = get_field('accordion_items');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="accordion__inner container container--<?php echo get_field('block_spacing'); ?>">
        <?php if ($accordionItems) : ?>
            <?php if ($title = get_field('title')) : ?>
                <h2><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($description = get_field('description')) : ?>
                <p class="large"><?php echo $description; ?></p>
            <?php endif; ?>
            
            <dl>
            <?php foreach($accordionItems as $item): ?>
                <dt class="accordion"><?php echo $item['title']; ?></dt>
                <dd class="panel"><?php echo $item['content']; ?></dd>
            <?php endforeach; ?>
            </dl>
        <?php else: ?>
            <h2>Accordion</h2>
            <p>Please add an item to the accordion list</p>
        <?php endif; ?>
    </div>
</section>