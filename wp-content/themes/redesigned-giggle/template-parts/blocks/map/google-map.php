<?php require_once get_template_directory() . '/inc/theme-functions/Maps.php'; ?>

<div class="acf-map" data-zoom="16">
    <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
</div>