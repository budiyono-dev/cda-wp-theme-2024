<?php

function enqueue_styles() {
    wp_enqueue_style('cda-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

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
