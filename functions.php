<?php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'ta-slicer',
        get_template_directory_uri() . '/assets/css/travel-slicer.css'
    );
    wp_enqueue_style(
        'ta-location',
        get_template_directory_uri() . '/assets/css/location.css'
    );
    wp_enqueue_style(
        'ta-about',
        get_template_directory_uri() . '/assets/css/ta-about.css'
    );
    wp_enqueue_script(
        'ta-parallax',
        get_template_directory_uri() . '/assets/js/parallax.js',      [], false, true);
    wp_enqueue_script(
        'ta-about',         
        get_template_directory_uri() . '/assets/js/ta-about.js',       [], false, true);
    wp_enqueue_script(
        'ta-travel-slider',
        get_template_directory_uri() . '/assets/js/travel-slider.js',  [], false, true);
});
add_theme_support('post-thumbnails');