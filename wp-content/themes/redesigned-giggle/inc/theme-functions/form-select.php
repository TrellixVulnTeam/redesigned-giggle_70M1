<?php /* Conditional Logic to display field if an options page field is set */
function check_wp_forms($field) {
    
    if(get_field('forms_plugin', 'option') === 'wpforms'){
        return $field;
    }
    else{
        return;
    }
}
// Make sure to use correct field key instead of 'XXXXXXX'
add_filter('acf/prepare_field/key=field_6209330d95564', 'check_wp_forms', 20);

/* Conditional Logic to display field if an options page field is set */
function check_g_forms($field) {
    
    if(get_field('forms_plugin', 'option') === 'gforms'){
        return $field;
    }
    else{
        return;
    }
}
// Make sure to use correct field key instead of 'XXXXXXX'
add_filter('acf/prepare_field/key=field_620828d5a0c6f', 'check_g_forms', 20);

/* Conditional Logic to display field if an options page field is set */
function check_cf7_forms($field) {
    
    if(get_field('forms_plugin', 'option') === 'contactform7'){
        return $field;
    }
    else{
        return;
    }
}
// Make sure to use correct field key instead of 'XXXXXXX'
add_filter('acf/prepare_field/key=field_620bedc3723c4', 'check_cf7_forms', 20);

/* Conditional Logic to display field if an options page field is set */
function check_null_forms($field) {
    
    if(get_field('forms_plugin', 'option') === 'null'){
        return $field;
    }
    else{
        return;
    }
}
// Make sure to use correct field key instead of 'XXXXXXX'
add_filter('acf/prepare_field/key=field_6209a66290048', 'check_null_forms', 20);