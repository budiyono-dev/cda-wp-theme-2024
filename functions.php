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

function load_dashicons_front_end() {
    wp_enqueue_style( 'dashicons' );
}
add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );

function register_menus() {
    register_nav_menus(
        array(
            'primary' => 'Header Menu',
            'secondary' => 'Footer Menu',
        )
    );
}
add_action('init', 'register_menus');

function cda_sidebar() {
    register_sidebar(
        array(
            'name' => 'Primary Sidebar',
            'id' => 'main-sidebar',
            'description' => 'sidebar sebelah kiri'
        )
    );
    
    register_sidebar(
        array(
            'name' => 'Secondary Sidebar',
            'id' => 'secondary-sidebar',
            'description' => 'sidebar sebelah kanan'
        )
    );

    register_sidebar(
        array(
            'name' => 'Home Sidebar',
            'id' => 'home-sidebar',
            'description' => 'sidebar sebelah kanan home'
        )
    );

}

add_action('widgets_init', 'cda_sidebar');

function cda_shortcode_loc_bar() {
    if(is_single()) return '<li id="loc-bar"><h2 class="wp-block-heading">In this article</h2></li>';
}

add_shortcode('cda_loc_bar', 'cda_shortcode_loc_bar');

function my_theme_excerpt_more( $more ) {
    return '&hellip;';
}
add_filter( 'excerpt_more', 'my_theme_excerpt_more' );





