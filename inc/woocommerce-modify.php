<?php


/*
**********************************
*
*          Shop Page 
*
**********************************
*/
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_product_archive_description', 30);
add_action('woocommerce_show_page_title', 'maxart_remove_title_page_shop');
function maxart_remove_title_page_shop($val)
{
    $val = false;
    return $val;
}

/*
**********************************
*
*         Single Product 
*
**********************************
*/
// remove link before image gallary in content-product.php <a>

add_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
function woocommerce_template_loop_product_link_open()
{
    echo '';
}
// remove link after image gallary in content-product.php </a>

add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
function woocommerce_template_loop_product_link_close()
{
    echo "";
}

// Change button add to card 
add_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);
function woocommerce_template_loop_add_to_cart(){
    global $product ;
    echo '<a href="'.get_permalink($product->get_id()).'" class="btn btn-primary ms-3 py-auto">Book Now</a>';
}
