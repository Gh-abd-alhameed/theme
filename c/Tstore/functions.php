<?php
require_once(get_template_directory() . "/inc/walker.php");





function tstore_add_styles()
{
    // @add file style
    wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/css/fontawesome-css/font-awesome.min.css?v4.7.1');
    wp_enqueue_style('swiper-css-min', get_template_directory_uri() . '/css/swiper-css/swiper-bundle.min.css?vv8.0.5');
    wp_enqueue_style('swiper-css-style-custom', get_template_directory_uri() . '/css/swiper-css/swiper.css?v4.5');

    wp_enqueue_style('bootstrap-main', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css?v5.1.0');
    wp_enqueue_style('nav-main', get_template_directory_uri() . '/css/nav.css?v5.3.0');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css?v6.0');
}
add_action('wp_enqueue_scripts', 'tstore_add_styles');
function tstore_add_scripts()
{
    wp_deregister_script('jquery');
    wp_register_script('jquery', includes_url("/js/jquery/jquery.js"), array(), false, true);
    // @add file scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js?v5.1.0', array('jquery'), false, true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/js/swiper-js/swiper-bundle.min.js?v8.0.5', array(), false, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'tstore_add_scripts');
//menu by ghadeer

function tstore_add_support()
{
    
    add_theme_support('menus');
    register_nav_menus(array(
        'nav-menu' => 'Main Menu',
        'side-bar' => 'Side menu',
    ));
    add_theme_support('post-thumbnails');
    add_image_size('small-thumbnail', 180, 120, true);
    add_image_size( 'custom-size', 220, 180 );
    add_theme_support('custom-background');
    add_theme_support('post-formats', array( 'aside' , 'image' , 'gallery', 'link'));
    //  add support custom header
    $args_header = array(
        'width'         => 80,
        'height'        => 80,
        'default-image' => get_template_directory_uri() . 'assets/image/logo1.png',
    );
    add_theme_support('custom-header', $args_header);
    //  add support custom logo
    $args_logo = array(
        'height'      => 500,
        'width'       => 125,
        'flex-height' => true,
        'flex-width'  => true,
    );
    add_theme_support('custom-logo', $args_logo);
}
add_action('after_setup_theme', 'tstore_add_support');

function tstore_nav_bar()
{
    $array_wp_nav_menu = array(
        'theme_location' => 'nav-menu',
        'menu_class' => "navbar-nav mx-auto",
        'container' => '',
        'walker' => new custom_menu(),
    );
    wp_nav_menu($array_wp_nav_menu);
}


function tstore_excerpt_length($length)
{
    return 15;
}
add_filter('excerpt_length', 'tstore_excerpt_length');
function tstore_excerpt_change_more($more)
{
    return '<a href="' . get_post_permalink() . '">...more</a>';
}
add_filter('excerpt_more', 'tstore_excerpt_change_more');
