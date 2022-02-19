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
$id = 'services-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'services';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$currentPageUrl = 'https://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];

$encodedPageUrl = urlencode($currentPageUrl);

$brandIdentity = get_field('identity', 'option');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="services__inner container container--<?php echo get_field('block_spacing'); ?>">
        <?php if ($title = get_field('title')) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($description = get_field('description')) : ?>
            <p class="large"><?php echo $description; ?></p>
        <?php endif; ?>
        <?php if( $services = get_field('services') ): ?>
                <ul class="grid">
                <?php global $post;
                $postsPerRow = count($services) < 4 ? count($services) : 3; ?>
                <?php foreach( $services as $post ): 
                    $post = $post['service']; ?>
                    <li class="col colspan-<?php echo 12 / $postsPerRow; ?>">
                    <?php //var_dump($post);?>
                        <?php 
                        $cardStyle = 'natural';
                        require get_template_directory() . '/template-parts/post-card.php'; ?>
                    </li>
                <?php endforeach; ?>
                </ul>
            <?php endif; ?>
    </div>
</section>