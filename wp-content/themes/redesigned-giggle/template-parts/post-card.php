<?php // single post card template 

setup_postdata( $post );

$cardStyle = get_field('style') ? get_field('style') : 'card';

if ($cardStyle === 'card') {
    $cardBg = get_field('card_style') ? get_field('card_style')['background_colour'] : 'transparent';
} else {
    $cardBg = 'transparent';
}

?>
<article id="post-<?php the_ID(); ?>" class="<?php echo $cardStyle === 'emphasised' ? 'grid' : ''; ?> bg-<?php echo $cardBg; ?> post-card post-card--<?php echo $cardStyle ?>">
    <div class="post-card__image <?php echo $cardStyle === 'emphasised' ? 'col colspan-5' : ''; ?>">
    <ul class="taglist small">    
    <?php if (get_the_tags()) : the_tags( '<li>', '</li><li>', '</li>' ); ?>
        <?php if (count(get_the_tags()) > 4) : ?>
            <li><span class="excess-tags">+<?php echo (count(get_the_tags()) - 4); ?></span></li>
    <?php endif; 
        endif; ?>
    </ul>
        <a class="post-card__link" href="<?php the_permalink(); ?>">
            <?php 
            $thumbnail_id = get_post_thumbnail_id( get_the_ID() );
            $imageAlt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);   
            
            $imageUrl = get_the_post_thumbnail_url(get_the_ID(), 'redesigned-giggle-522-286' ); ?>
            <div class="post-card__thumbnail">
                <?php require get_template_directory() . '/template-parts/components/image.php'; ?>
            </div>
        </a>
    </div>
    <div class="post-card__content <?php echo $cardStyle === 'emphasised' ? 'col colspan-7' : ''; ?>">
        <header class="entry-header">
            <?php if ( 'post' === get_post_type() ) : ?>
                <div class="entry-meta small">
                    <?php
                    redesigned_giggle_posted_on();
                    redesigned_giggle_posted_by();
                    ?>
                </div><!-- .entry-meta -->
            <?php endif; ?>
            <h3 class="<?php echo $cardStyle === 'emphasised' ? 'large' : ''; ?>"><?php the_title(); ?></h3>
        </header><!-- .entry-header container -->

        <div class="entry-summary <?php echo $cardStyle === 'emphasised' ? 'large' : ''; ?>">
            <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->

        <footer class="entry-footer">
            <?php if ($cardStyle === 'natural') {
                    $buttons = array(array(
                    'link_url' => get_the_permalink(),
                    'link_text' => 'Read More',
                    'button_style' => 'outline',
                    'button_colour' => get_field('button_colour') ? get_field('button_colour') : '1'
                    ));
                } elseif ($cardStyle === 'card') {
                    $buttons = array(array(
                        'link_url' => get_the_permalink(),
                        'link_text' => 'Read More',
                        'button_style' => 'fill',
                        'button_colour' => get_field('button_colour') ? get_field('button_colour') : '1'
                        ));
                } else {
                    $buttons = array(array(
                        'link_url' => get_the_permalink(),
                        'link_text' => 'Read More',
                        'button_style' => 'text',
                        'button_colour' => get_field('button_colour') ? get_field('button_colour') : '1'
                        ));
                }
                ?>
            <?php if ($buttons) {
                require get_template_directory() . '/template-parts/components/buttons.php';
            } ?>
        </footer><!-- .entry-footer -->
    </div>
</article><!-- #post-<?php the_ID(); ?> -->

<?php wp_reset_postdata(); ?>