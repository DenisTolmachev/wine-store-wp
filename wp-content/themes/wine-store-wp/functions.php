<?php
/**
 * Created by PhpStorm.
 * User: denis
 * Date: 15.04.2018
 * Time: 23:39
 */

function enqueue_styles() {
    wp_enqueue_style( 'whitesquare-style', get_stylesheet_uri());
    wp_register_style('font-style', 'http://fonts.googleapis.com/css?family=Oswald:400,300');
    wp_enqueue_style( 'font-style');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');

function enqueue_scripts () {
    wp_register_script('html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
    wp_enqueue_script('html5-shim');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

add_filter('document_title_parts', function( $parts ){
    if( isset($parts['site']) ) unset($parts['site']);
    return $parts;
});