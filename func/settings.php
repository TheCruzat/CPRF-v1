<?php

/**
 *
 * 	Theme Supports
 *
 * */

// Add Menus
add_theme_support( 'menus' );

// Add Thumbnails
add_theme_support( 'post-thumbnails' );

// Add Custom Logo
add_theme_support( 'custom-logo' );

// Add Title Tag
add_theme_support( 'title-tag' );

// Add Align Wide
add_theme_support( 'align-wide' );

function custom_unregister_core_blocks() {
    unregister_block_type( 'core/post-title' ); // Example: Removes the Paragraph block
}
add_action( 'init', 'custom_unregister_core_blocks' );
