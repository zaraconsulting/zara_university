<?php

function university_theme_files()
{
    // scripts
    wp_enqueue_script('main-university-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);

    // styles
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('unversity_main_styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'university_theme_files');


function university_features()
{
    // register_nav_menu('headerMenuLocation', 'Header Menu Location');
    // register_nav_menu('footerExplore', 'Footer Explore Location');
    // register_nav_menu('footerLearn', 'Footer Learn Location');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'university_features');