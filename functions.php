<?php

function get_cda_env(){
    return [
        'mode' => 'development',
    ];
}

function enqueue_styles() {
    $dir = get_cda_env()['mode'] === 'development' ? '/assets/css/style.css' : '/dist/style.css'; 
    wp_register_style('cda-style', get_template_directory_uri() . $dir, array(), false);
    wp_enqueue_style('cda-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles', 9);

function load_js(){
    $dir = get_cda_env()['mode'] === 'development' ? '/assets/js/index.js' : '/dist/index.min.js';
    $scripts = array(
        'main' => $dir,
    );

    foreach ($scripts as $key => $s) {
        wp_register_script($key, get_template_directory_uri() . $s, array('jquery'), false, true);
        wp_enqueue_script($key);
    }
}
add_action('wp_enqueue_scripts', 'load_js');

function register_menus() {
    register_nav_menus(
        array(
            'primary' => 'Header Menu',
            'secondary' => 'Footer Menu',
            'home_slide_menu' => 'Home Slide Menu',
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

function cda_fallback_category_menu_home() {
    echo '<ul>';
    wp_list_categories(
        array(
            'depth'     => 3,
            'title_li'  => '',
            'hide_empty' => 0,
            'exclude'    => array( 1 )
        )
    ); 
    
    echo '</ul>';
}





