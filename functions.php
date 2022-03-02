<?php 

require_once get_template_directory() . '/inc/function-admin.php';
require_once get_template_directory() . '/inc/enqueue-admin.php';
require_once get_template_directory() . '/inc/shortcode.php';
require_once get_template_directory() . '/inc/walker-menu.php';
require_once get_template_directory() . '/inc/theme-support.php';
require_once get_template_directory() . '/inc/widget.php';
require_once get_template_directory() . '/inc/api.php';


// remove ver wordpress 
remove_action('wp_head', 'wp_generator');
function maxart_remove_ver_wordpress_form_style($tag){
    $tag =str_replace('?ver=5.9.1' , '' , $tag);
    return $tag ;

}
add_filter("style_loader_tag",'maxart_remove_ver_wordpress_form_style');

function maxart_add_type_in_main_js($tag, $handel, $src)
{
    if ("main-js" !== $handel && 'main-ace-js' !== $handel) {
        $tag = str_replace('?ver=5.9.1' ,'',$tag);
        return $tag;
    }
    $tag = '<script type="text/babel" src="' . esc_url($src) . '" ></script>';
    return $tag;
}
add_filter('script_loader_tag', 'maxart_add_type_in_main_js', 10, 3);

