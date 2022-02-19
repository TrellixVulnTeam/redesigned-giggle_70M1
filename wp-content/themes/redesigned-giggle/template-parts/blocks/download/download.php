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
$id = 'download-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'download';
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
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="download__inner container container--<?php echo get_field('block_spacing'); ?>">
        <div class="container--narrow bg-<?php echo get_field('background_colour'); ?>">

        <?php
            $file = get_field('downloadable_content');
            if( $file ):

                // Extract variables.
                $url = $file['url'];
                $title = $file['title'];
                $caption = $file['caption'];
                $icon = $file['icon'];
                $ext = pathinfo(esc_attr($url))['extension'];

                // Display image thumbnail when possible.
                if( $file['type'] == 'image' ) {
                    $icon =  $file['sizes']['thumbnail'];
                }

                // Begin caption wrap.
                if( $caption ): ?>
                    <div class="wp-caption">
                <?php endif; ?>
                    <?php if ($ext === 'zip' || $ext === 'rar') : ?>    
                        <span class="xlarge">
                        <?php 
                            $iconName = 'archive';
                            require get_template_directory() . '/template-parts/components/icon.php'; ?>
                        </span>
                    <?php else: ?>
                        <span class="xlarge">
                            <?php 
                                $iconName = 'document';
                                require get_template_directory() . '/template-parts/components/icon.php'; ?>
                        </span>
                    <?php endif; ?>
                    <span><?php echo esc_html($title); ?></span>
                    <?php 
                    var_dump(get_field('button_colour'));
                     $buttons = array(array(
                        'link_url' => esc_attr($url),
                        'link_text' => 'Download Now',
                        'button_style' => 'fill',
                        'button_colour' => '1'//get_field('button_colour')['button_colour']
                        ));
                        require get_template_directory() . '/template-parts/components/buttons.php';
                        ?>

                <?php 
                // End caption wrap.
                if( $caption ): ?>
                    <p class="wp-caption-text"><?php echo esc_html($caption); ?></p>
                    </div>
                <?php endif; ?>
                <?php else: ?>
                <h2>Please select a file</h2>
            <?php endif; ?>
        </div>
    </div>
</section>