<?php

/*
    @package maxart
*/

function maxart_enqueue_script($hook)
{
    if ('toplevel_page_maxart_settings' === $hook) :
        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap/bootstrap.min.css', array(), '1.0.0');
        wp_enqueue_style('main-css', get_template_directory_uri() . '/inc/assets/css/main.css', array(), '1.0.0');
        wp_enqueue_script("bable-js", get_template_directory_uri() . '/inc/assets/js/babel.min.js', array(), '1.0.0');
        wp_enqueue_script("bootstrap-js", get_template_directory_uri() . '/inc/assets/js/bootstrap/bootstrap.min.js', array(), '1.0.0', true);
        wp_enqueue_script("main-js", get_template_directory_uri() . '/inc/assets/js/main.js', array(), '1.0.0', true);
    elseif ("maxart_page_maxart_submenu_custom_css" === $hook):
        wp_enqueue_style('ace-css', get_template_directory_uri() . '/inc/assets/css/ace.css', array(), '1.0.0');
        wp_enqueue_script("ace-js", get_template_directory_uri() . '/inc/assets/js/ace/ace.js', array('jquery'), '1.0.0',true);
        wp_enqueue_script("ace-autocomp-js", get_template_directory_uri() . '/inc/assets/js/ace-autocomp.js', array('jquery'), '1.0.0',true);
        wp_enqueue_script("bable-js", get_template_directory_uri() . '/inc/assets/js/babel.min.js', array(), '1.0.0');
        wp_enqueue_script("main-ace-js", get_template_directory_uri() . '/inc/assets/js/ace.js', array(), '1.0.0',true);
    endif;
}
add_action('admin_enqueue_scripts', 'maxart_enqueue_script');
function maxart_add_type_in_main_js($tag, $handel, $src)
{
    if ("main-js" !== $handel) {
        return $tag;
    }
    $tag = '<script type="text/babel" src="' . esc_url($src) . '" ></script>';
    return $tag;
}
add_filter('script_loader_tag', 'maxart_add_type_in_main_js', 10, 3);

function maxart_add_type_in_main_ace_js($tag, $handel, $src)
{
    if ("main-ace-js" !== $handel) {
        return $tag;
    }
    $tag = '<script type="text/babel" src="' . esc_url($src) . '" ></script>';
    return $tag;
}
add_filter('script_loader_tag', 'maxart_add_type_in_main_ace_js', 10, 3);