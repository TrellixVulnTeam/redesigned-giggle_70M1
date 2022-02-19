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
$id = 'stats-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'stats';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="stats__inner container container--<?php echo get_field('block_spacing'); ?>">
        <?php if ($title = get_field('title')) : ?>
            <h2><?php echo $title; ?></h2>
        <?php endif; ?>
        <?php if ($description = get_field('description')) : ?>
            <p class="large"><?php echo $description; ?></p>
        <?php endif; ?>
        <?php if ($statistics = get_field('statistics')) : ?>
            <dl class="grid">
                <?php global $post;
                    $postsPerRow = count($statistics) < 4 ? count($statistics) : 3; ?>
                <?php foreach ($statistics as $stat) : ?>
                    <!-- <div class="col colspan-<?php echo 12 / $postsPerRow; ?>"> -->
                        <?php $style = $stat['style']; ?>
                        <?php if ($style === 'stat') : ?>
                            <dt class="xlarge col colspan-<?php echo 12 / $postsPerRow; ?>">
                                <span><?php echo $stat['value']['number']; ?></span>
                                <?php if (isset($stat['value']['unit'])) : ?>
                                    <span class="stat-unit"><?php echo $stat['value']['unit']; ?></span>
                                <?php endif; ?>
                            </dt>
                        <?php elseif ($style === 'text') : ?>
                            <dt class="large col colspan-<?php echo 12 / $postsPerRow; ?>">
                                <span><?php echo $stat['value']['text']; ?></span>
                            </dt>
                        <?php elseif ($style === 'icon') : ?>
                            <dt class="large col colspan-<?php echo 12 / $postsPerRow; ?>">
                            <?php 
                            $image = $stat['value']['icon'];
                            $imageAlt = get_post_meta($image['ID'], '_wp_attachment_image_alt', true); 
                            $imageUrl = $image['sizes']['redesigned-giggle-522-286']; ?>
                                <div>
                                    <?php require get_template_directory() . '/template-parts/components/image.php'; ?>
                                </div>
                                <span><?php echo $stat['value']['text']; ?></span>
                            </dt>
                        <?php endif; ?>
                        <?php if (isset($stat['description'])) : ?>
                            <dd class="large col colspan-<?php echo 12 / $postsPerRow; ?>"><?php echo $stat['description']; ?></dd>
                        <?php endif; ?>
                    <!-- </div> -->
                <?php endforeach; ?>
            </dl>
        <?php endif; ?>
    </div>
</section>