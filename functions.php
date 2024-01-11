<?php

function enqueue_styles() {
    wp_enqueue_style('cda-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function load_js(){	
    wp_register_script('main', get_template_directory_uri() . '/js/index.js', 'jquery', false, true);
    wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'load_js');

function register_menus() {
    register_nav_menus(
        array(
            'primary' => 'Header Menu',
        )
    );
}
add_action('init', 'register_menus');

function cda_sidebar() {
    register_sidebar(
        array(
            'name' => 'Primary Sidebar',
            'id' => 'main-sidebar',
            'description' => 'sidebar sebelah kiri',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        )
    );
    
    register_sidebar(
        array(
            'name' => 'Secondary Sidebar',
            'id' => 'secondary-sidebar'
        )
    );

}

add_action('widgets_init', 'cda_sidebar');

function cda_shortcode_loc_bar() {
    if(is_single()) return '<li id="loc-bar"><h2 class="wp-block-heading">In this article</h2></li>';
}

add_shortcode('cda_loc_bar', 'cda_shortcode_loc_bar');

