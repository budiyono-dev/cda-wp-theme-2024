<?php

function enqueue_styles() {
    wp_register_style('cda-style', get_template_directory_uri() . '/dist/css/style.css', array(), false);
    wp_enqueue_style('cda-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function load_js(){	
    wp_register_script('main', get_template_directory_uri() . '/dist/js/index.min.js', array(), false, true);
    wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'load_js');

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

function my_theme_excerpt_more( $more ) {
    global $post;
    return '&hellip;'. '<a href="'. get_permalink($post->ID) . '">'.__('Baca selengkapnya').'</a>';
}
add_filter( 'excerpt_more', 'my_theme_excerpt_more' );





