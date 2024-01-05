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
