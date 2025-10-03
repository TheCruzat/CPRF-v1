<?php

function tws_load_scripts() {
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', false, null, 'defer');
	wp_enqueue_style('tailwind', get_template_directory_uri() . '/cprf-tw.css', false, '1.0');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css', false, '1.0');
}
add_action( 'wp_enqueue_scripts', 'tws_load_scripts' );

