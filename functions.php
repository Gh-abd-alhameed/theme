<?php

require_once get_template_directory() . '/inc/function-admin.php';
require_once get_template_directory() . '/inc/enqueue-admin.php';
require_once get_template_directory() . '/inc/walker-menu.php';
require_once get_template_directory() . '/inc/shortcode.php';
require_once get_template_directory() . '/inc/woocommerce-modify.php';
require_once get_template_directory() . '/inc/theme-support.php';
require_once get_template_directory() . '/inc/widget.php';
require_once get_template_directory() . '/inc/api.php';
require_once get_template_directory() . '/inc/short-functions.php';


// remove ver wordpress 
remove_action('wp_head', 'wp_generator');
function maxart_remove_ver_wordpress_form_style($tag)
{
    global $wp_version;
    global $woocommerce;

    $tag = str_replace(array('?ver=' . $wp_version, '?ver=' . $woocommerce->version), '', $tag);
    return $tag;
}
add_filter("style_loader_tag", 'maxart_remove_ver_wordpress_form_style');

function maxart_add_type_in_main_js($tag, $handel, $src)
{
    global $wp_version;
    global $woocommerce;
    $tag = str_replace(array('?ver=' . $wp_version, '?ver=' . $woocommerce->version), '', $tag);
    return $tag;
}
add_filter('script_loader_tag', 'maxart_add_type_in_main_js', 10, 3);
