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
$id = 'highlighted-content-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'highlighted-content';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$blockData = [
    'title' => get_field('title'),
    'mode' => get_field('mode'),
    'filterPosts' => get_field('filter_posts'),
    'content' => get_field('content'),
    'style' => get_field('style')
];

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> highlighted-content--<?php echo $blockData['style']; ?> bg-<?php echo get_field('background_colour'); ?>">
    <div class="highlighted-content__inner container">
        <h2><?php echo $blockData['title']; ?></h2>

        <?php if ($blockData['mode'] !== 'manual') :
            $postType = $blockData['filterPosts']['post_type'];
            $postsToShow = $blockData['filterPosts']['posts_to_show'];
            require get_template_directory() . '/template-parts/post-grid.php'; 
        else: 
            if( $blockData['content'] ): ?>
                <ul class="grid">
                <?php global $post;
                $postsPerRow = count($blockData['content']) < 4 ? count($blockData['content']) : 3; ?>
                <?php foreach( $blockData['content'] as $post ): 
                    $post = $post['post']; ?>
                    <li class="col colspan-<?php echo 12 / $postsPerRow; ?>">
                        <?php require get_template_directory() . '/template-parts/post-card.php'; ?>
                    </li>
                <?php endforeach; ?>
                </ul>
            <?php endif;
        endif; ?>
    </div>
</section>