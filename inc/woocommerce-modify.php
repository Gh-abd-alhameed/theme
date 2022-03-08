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
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
add_action('woocommerce_show_page_title', 'maxart_remove_title_page_shop');
function maxart_remove_title_page_shop($val)
{
    $val = false;
    return $val;
}

/*
**********************************
*
*        Loop Product 
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
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
function woocommerce_template_loop_add_to_cart()
{
    global $product;
    echo '<a href="' . get_permalink($product->get_id()) . '" class="btn ms-3 py-auto"  style="background-color: #8016A5 ; color:white;">Book Now</a>';
}

//remove rating in product loop
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_rating',5);

// change title product in shop page 
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
function woocommerce_template_loop_product_title()
{
    global $product;
    echo '<a href="' . get_permalink($product->get_id()) . '" style="text-decoration:none;">';
    echo '<h5 class="card-title pb-4" style="color:#8016A5; font-weight:bold;">' . $product->get_name() . '</h5>';
    echo '</a>';
}

// remove order product in shop page
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
function woocommerce_catalog_ordering()
{
    global $product;

    $terms = get_terms(
        "product_cat",
        array(
            'orderby' => 'slug',
            'hide_empty' => false,
            'exclude' => array(
                19
            )
        )
    );

    if ($terms) :
        echo   '<div class="col-3  pb-3">';
        echo ' <select name="product_cat" id="product_cat" class="form-select" aria-label="Default select example">';
        foreach ($terms as $term) :
            echo '<option value="' . esc_attr($term->name) . '">' . $term->name . '</option>';
        endforeach;
        echo '</select>';
        echo '</div>';
    endif;
}



/*************************
 *   Single Product
 *************************/

/***************************************************************/
// @hooks single product woocommerce_single_product_summary  
/***************************************************************/
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title',5);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
function woocommerce_template_single_title()
{
    global $product;
    echo '<a style="text-decoration:none;">';
    echo '<h1 class="card-title pb-4" style="color:#8016A5; font-weight:bold;">' . $product->get_name() . '</h1>';
    echo '</a>';
}
remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating',10);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
function woocommerce_template_single_price()
{
    global $product;
    echo '<div class="box-price d-flex flex-row" style="border:1px dashed #8016A5;color:#8016A5;width:fit-content;">';
    echo '<h4 class=" load my-auto py-2 px-2 fw-bold " >' .  $product->get_price() . ' ' . get_woocommerce_currency_symbol() . ' / Day</h4>';
    echo '<h6 class=" load my-auto py-2 px-2 fw-bold" style="text-decoration: line-through; text-align:center">' . $product->get_regular_price() . ' ' . get_woocommerce_currency_symbol() . ' / Day</h6>';
    echo '</div>';
}

// custom description single product
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
function woocommerce_template_single_excerpt()
{
    global $product;
    echo '<p class="load" style="color:white;">' . $product->get_short_description() . '</p>';
}

// custom meta single product
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

function woocommerce_template_single_meta()
{
    global $product;
    echo '<p class="load" style="color:white;">SKU: ' . $product->get_sku() . '</p>';
    echo '<div class= "d-flex flex-row">';
    $categories = get_the_terms($product->get_id(), "product_cat");
    echo '<p class="load" style="color:white;">Categories: ';
    foreach ($categories as $category) :
        $car_parent = ($category->parent) ? "$category->parent/$category->slug" : "/$category->slug";
        echo '<a style="text-decoration:none;color:#8016A5;" href="' . esc_url(home_url() . "/product-category/" . $car_parent) . '">' . $category->name . '</a>, ';
    endforeach;
    echo '</p>';
    echo '</div>';
}
/***************************************************************/
// @hooks single product woocommerce_after_single_product_summary
/***************************************************************/
// remove related products in single product page

remove_action('woocommerce_after_single_product_summary','woocommerce_upsell_display',15);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);
