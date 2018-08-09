<?php

/**********************************************************************************
* Enque Theme Scripts
**********************************************************************************/
function essence_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'fontawesome-style', 'https://use.fontawesome.com/releases/v5.0.13/css/all.css' );
	wp_enqueue_script('site-script', get_stylesheet_directory_uri() . '/js/site.js', array('jquery'), null, false);
	wp_enqueue_script('mo-script','https://cdn.jsdelivr.net/mojs/latest/mo.min.js',null, false, true);
	wp_enqueue_script('animations-script', get_stylesheet_directory_uri() . '/js/animations.js', array('mo-script'), null, true);
}

add_action( 'wp_enqueue_scripts', 'essence_theme_enqueue_styles' );

/**********************************************************************************
* Register Essence Top Menu
**********************************************************************************/
function essence_register_menu() {
    register_nav_menu('essence-top-menu',__( 'Essence Top Menu' ));
}

add_action( 'init', 'essence_register_menu' );

/**********************************************************************************
* One click demo import activation
**********************************************************************************/
require_once get_stylesheet_directory() . '/auto-install/class-tgm-plugin-activation.php';
require_once get_stylesheet_directory() . '/configuration/theme-configuration.php';
add_action( 'tgmpa_register', 'essence_register_required_plugins' );

