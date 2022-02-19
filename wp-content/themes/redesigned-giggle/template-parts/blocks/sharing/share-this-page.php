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
$id = 'share-this-page-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'share-this-page';
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
    <div class="share-this-page__inner container container--<?php echo get_field('block_spacing'); ?>">
        <h3>Share this page</h3>
        <ul class="share-list">
            
            <li class="share-list__item">
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $encodedPageUrl; ?>">
                    <ion-icon name="logo-facebook"></ion-icon> 
                    <span>Facebook</span>
                </a>
            </li>
            <li class="share-list__item">
                <a href="http://twitter.com/share?text=Check out this post on <?php echo $brandIdentity['site_title'] ? $brandIdentity['site_title'] : get_bloginfo( 'name' ); ?>&url=http://<?php echo $encodedPageUrl; ?>">
                    <ion-icon name="logo-twitter"></ion-icon> <span>Twitter</span>
                </a>
            </li>
            <li class="share-list__item">
                <a href="http://pinterest.com/pin/create/button/?url=<?php echo $encodedPageUrl; ?>">
                    <ion-icon name="logo-pinterest"></ion-icon> <span>Pinterest</span>
                </a>
            </li>
        </ul>
    </div>
</section>