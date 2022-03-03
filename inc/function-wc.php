<?php 




add_filter('woocommerce_show_page_title' , 'maxart_change_title_shop');

function maxart_change_title_shop($val){

     $val = false;
     return $val ;
}
add_filter('woocommerce_after_shop_loop_item_title' , 'maxart_change_product_title_shop');

function maxart_change_product_title_shop($val){

    echo "ghadeer" . $val ;
}