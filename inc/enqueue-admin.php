<?php

/*
    @package maxart
*/




function maxart_enqueue_admin_page_script($hook)
{
    if ('toplevel_page_maxart_settings' === $hook) :
        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css', array(), '1.0.0');
        wp_enqueue_style('main-css', get_template_directory_uri() . '/inc/assets/css/main.css', array(), '1.0.0');
        wp_enqueue_script("bable-js", get_template_directory_uri() . '/inc/assets/js/babel.min.js', array(), '1.0.0');
        wp_enqueue_script("bootstrap-js", get_template_directory_uri() . 'assets/js/bootstrap/bootstrap.min.js', array(), '1.0.0', true);
        wp_enqueue_script("main-js", get_template_directory_uri() . '/inc/assets/js/main.js', array(), '1.0.0', true);
    elseif ("maxart_page_maxart_submenu_custom_css" === $hook) :
        wp_enqueue_style('ace-css', get_template_directory_uri() . '/inc/assets/css/ace.css', array(), '1.0.0');
        wp_enqueue_script("ace-js", get_template_directory_uri() . '/inc/assets/js/ace/ace.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script("ace-autocomp-js", get_template_directory_uri() . '/inc/assets/js/ace-autocomp.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script("bable-js", get_template_directory_uri() . '/inc/assets/js/babel.min.js', array(), '1.0.0');
        wp_enqueue_script("main-ace-js", get_template_directory_uri() . '/inc/assets/js/ace.js', array(), '1.0.0', true);
    endif;
}
add_action('admin_enqueue_scripts', 'maxart_enqueue_admin_page_script');
function maxart_enqueue_style()
{
    
    wp_enqueue_style('section-css', get_template_directory_uri() . '/assets/css/section.css', array(),'6.0.0');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap/bootstrap.min.css', array(), '5.1.0');
    wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/assets/font-awesome/css/all.min.css', array(),'6.0.0');
    wp_enqueue_style('swiper-css', get_template_directory_uri() . '/assets/css/swiper-css/swiper-bundle.min.css', array(), '1.0.0');
    wp_enqueue_style('swiper-main-css', get_template_directory_uri() . '/assets/css/swiper-css/swiper.css', array(), '1.0.0');
    wp_enqueue_style('contact-us-css', get_template_directory_uri() . '/assets/js/form-contact/contact_us.css', array(), '1.0.0');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0');
    wp_enqueue_style('nav-css', get_template_directory_uri() . '/assets/css/nav.css', array(), '1.0.0');
}
add_action('wp_enqueue_scripts', 'maxart_enqueue_style');
function maxart_enqueue_script()
{
    wp_enqueue_script('font-awesome-js', get_template_directory_uri() . '/assets/font-awesome/js/all.min.js', array(), '6.0.0');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap/bootstrap.min.js', array(), '1.0.0', true);
    wp_enqueue_script('swiper-js', get_template_directory_uri() . '/assets/js/swiper-js/swiper-bundle.min.js', array(), '1.0.0', true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
    wp_enqueue_script('contact-us-js', get_template_directory_uri() . '/assets/js/form-contact/contact_us.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'maxart_enqueue_script');
