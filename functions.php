<?php

namespace Codingduluaja\Theme\Theme2024;

if (!defined('ABSPATH')) exit('restricted access');

function enqueue_styles() {
    wp_enqueue_style('cda-style', get_template_directory_uri() . '/assets/css/style.css', array(), false);
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\enqueue_styles');

function load_js() {
    wp_enqueue_script('cda-script', get_template_directory_uri() . '/assets/js/index.js', ['jquery'], false, true);
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\load_js');

function register_menus() {
    register_nav_menus([
        'primary' => 'Header Menu',
        'secondary' => 'Footer Menu',
        'home_slide_menu' => 'Home Slide Menu',
    ]);
}

add_action('init', __NAMESPACE__ . '\\register_menus');

function cda_sidebar() {
    register_sidebar([
        'name' => 'Primary Sidebar',
        'id' => 'main-sidebar',
        'description' => 'sidebar sebelah kiri'
    ]);

    register_sidebar([
        'name' => 'Secondary Sidebar',
        'id' => 'secondary-sidebar',
        'description' => 'sidebar sebelah kanan'
    ]);

    register_sidebar([
        'name' => 'Home Sidebar',
        'id' => 'home-sidebar',
        'description' => 'sidebar sebelah kanan home'
    ]);
}

add_action('widgets_init', __NAMESPACE__ . '\\cda_sidebar');

function my_theme_excerpt_more($more) {
    global $post;
    return '&hellip;' . '<a href="' . get_permalink($post->ID) . '">' . __('Baca selengkapnya') . '</a>';
}

add_filter('excerpt_more', __NAMESPACE__ . '\\my_theme_excerpt_more');

