<?php

function my_theme_variables() {
    $my_theme_variables = array(
        'logo' => get_stylesheet_directory_uri() . '/assets/img/site-logo.png',
        'full_school_name' => 'Provo High School',
        'short_school_name' => 'Provo High',
        'school_address' => '1199 N. Lakeshore Dr. Provo, Utah 84601',
        'google_tag_manager_id' => 'G-FTPJPV04N2',
        // 'search_icon' => get_template_directory_uri() . '/assets/icons/search-loupe.svg'
    );
    return $my_theme_variables;
}
function pcsd_child_theme_enqueue_styles() {
    wp_enqueue_style('variables', get_stylesheet_directory_uri() . '/assets/css/variables.css', '', '1.0.0', false);
}
add_action('wp_enqueue_scripts', 'pcsd_child_theme_enqueue_styles', 9999);