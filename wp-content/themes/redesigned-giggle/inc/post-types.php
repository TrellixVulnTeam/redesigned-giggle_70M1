<?php
/**
 * Load events post type file.
 */

if (in_array('event', get_field('enabled_post_types', 'option'))) {
    require get_template_directory() . '/inc/post-types/events.php';
}

/**
 * Load events post type file.
 */
if (in_array('case-study', get_field('enabled_post_types', 'option'))) {
    require get_template_directory() . '/inc/post-types/case-studies.php';
}

/**
 * Load events post type file.
 */
if (in_array('services', get_field('enabled_post_types', 'option'))) {
    require get_template_directory() . '/inc/post-types/services.php';
}

/**
 * Load events post type file.
 */
if (in_array('staff', get_field('enabled_post_types', 'option'))) {
    require get_template_directory() . '/inc/post-types/staff-profiles.php';
}