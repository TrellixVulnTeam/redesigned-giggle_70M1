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
$id = 'price-list-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'price-list';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$items = get_field('items');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="price-list__inner container container--<?php echo get_field('block_spacing'); ?>">
        <?php if ($title = get_field('title')) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($description = get_field('description')) : ?>
            <p class="large"><?php echo $description; ?></p>
        <?php endif; ?>
        <?php if ($items) : ?>
            <dl class="price-list__list">
                <?php foreach ($items as $item) : ?>
                    <dt><?php echo $item['name']; ?></dt>
                    <dd><?php echo $item['description']; ?><?php echo $item['price']; ?></dd>
                <?php endforeach; ?>
            </dl>
        <?php else : ?>
            <h3>Price List</h3>
            <p>Please add items to the price list</p>
        <?php endif; ?>
    </div>
</section>