<?php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/style.css'
    );
    wp_enqueue_style(
        'travel-slicer',                                          // ← handle único
        get_template_directory_uri() . '/assets/css/travel-slicer.css'
    );
    wp_enqueue_style(
        'location',                                               // ← handle único
        get_template_directory_uri() . '/assets/css/location.css'
    );
    wp_enqueue_script(
        'test-js',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        false,
        true
    );
});
add_theme_support('post-thumbnails');