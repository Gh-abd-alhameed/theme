<?php
require_once ( get_template_directory() . '/inc/menu_walker.php')  ;
// **********************
//    add stylesheet
// **********************
function fastcarrental_set_site_style(){
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css?v8.0', array(), true );
    wp_enqueue_style( 'swiper-bundle-css', get_template_directory_uri() . '/css/swiper-css/swiper-bundle.min.css?v8.1', array(), true );
    wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/css/swiper-css/swiper.css?8.2', array(), true );
    wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/css/fontawesome-css/font-awesome.min.css?v8.3', array(), true );
    wp_enqueue_style( 'nav-css', get_template_directory_uri() . '/css/nav.css?v8.4', array(), true );
    wp_enqueue_style( 'section-css', get_template_directory_uri() . '/css/section.css?v4.7', array(), true );
    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/css/main.css?v8.5', array(), true );
}
add_action('wp_enqueue_scripts' , 'fastcarrental_set_site_style');

// **********************
//    add javascript
// **********************
function fastcarrental_set_site_script(){
    wp_enqueue_script( 'bootstrap-js',get_template_directory_uri() . '/js/bootstrap/bootstrap.min.js?v5.1', array(), false, true );
    wp_enqueue_script( 'swiper-js',get_template_directory_uri() . '/js/swiper-js/swiper-bundle.min.js?v8.7', array(), false, true );
    wp_enqueue_script( 'swiper-custom-js',get_template_directory_uri() . '/js/swiper-js/swiper.js?v5.98.3', array('swiper-js'), false, true );
    wp_enqueue_script( 'main-js',get_template_directory_uri() . '/js/main.js?v8.8', array(), false, true );
}
add_action('wp_enqueue_scripts' , 'fastcarrental_set_site_script');

//
function add_menus(){
    register_nav_menus( array(
        'Main_menu' => 'top menu',
        'sidemenu' => 'sidemenu',
        ) );
}
add_action('init','add_menus') ;

//
function set_menu(){
    wp_nav_menu(array(
        'menu' => 'Main_menu',
        'menu_class' => 'navbar-nav',
        'container' => '',
        'walker' => new custom_menu(),

    ));
}
// post formats
add_action('after_setup_theme','setup_post_formats');
function setup_post_formats(){
  add_theme_support('post-formats',array('image','gallery'));

}
add_action('after_setup_theme','setup_post_formats');
// post thumbnials
function add_theme_support_featured_image(){
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme' , 'add_theme_support_featured_image');
