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

function get_image_path(){
    return get_theme_root_uri() . '/' . get_template() . '/images';
}

add_filter('document_title_parts', function( $parts ){
    if( isset($parts['site']) ) unset($parts['site']);
    return $parts;
});

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function getLatestWoocommerceProductsList($stock, $posts_per_page){
    $args = [
        'post_type' => 'product',
        'stock' => $stock,
        'posts_per_page' => $posts_per_page,
        'orderby' =>'date',
        'order' => 'DESC'
    ];

    $loop = new WP_Query( $args );

    $result = [];

    while ($loop->have_posts()){
        $loop->the_post();
        array_push($result, [
            'id' => $loop->post->ID,
            'permalink' => get_permalink( $loop->post ),
            'title' => $loop->post->post_title,
            'thumb' => has_post_thumbnail( $loop->post->ID ) ? get_the_post_thumbnail($loop->post->ID, 'shop_catalog') : '<img src="'.woocommerce_placeholder_img_src().'" alt="My Image Placeholder" width="65px" height="115px" />',

        ]);
    }

    wp_reset_query();

    if(!empty($result))
        return $result;

    return false;
}