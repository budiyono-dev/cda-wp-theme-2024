<?php
add_action( 'after_setup_theme', 'theme_slug_setup' );

function theme_slug_setup() {
	add_theme_support( 'wp-block-styles' );
}