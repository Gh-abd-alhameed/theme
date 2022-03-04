<footer class="">
    <div class="container my-5 ">

        <div class="row d-flex justify-content-center">
            <?php get_sidebar('About') ?>
            <?php get_sidebar('Our Services') ?>
            <?php get_sidebar('Get In Touch') ?>
            <?php get_sidebar('Location') ?>
            <div class="d-flex justify-content-between py-4 my-4 border-top">
                <?php $site_name = get_option('maxart_register_namesite'); ?>
                <p class="load">&copy; <?php echo date('Y') ?> <a class="" style="text-decoration: none;color: #8016a5 ;font-weight: bold;" href="<?php echo esc_url(get_bloginfo('url')); ?>"><?php echo $site_name; ?> </a>, All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a href="https://facebook.com/<?php echo esc_attr($facebook); ?>"><i class="fa-brands fa-facebook-square link-dark" style="width: 25px; height:25px;"></i></a></li>
                    <li class="ms-3"> <a href="https://twitter.com/<?php echo esc_attr($twitter); ?>"><i class="fa-brands fa-twitter-square link-dark" style="width: 25px; height:25px;"></i></i></a>
                    </li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#facebook" />
                            </svg></a></li>
                </ul>
            </div>

        </div>
</footer>
<?php wp_footer();   ?>

<pre>
WC_Product_Simple Object
(
    [object_type:protected] => product
    [post_type:protected] => product
    [cache_group:protected] => products
    [data:protected] => Array
        (
            [name] => ghadeer
            [slug] => ghadeer
            [date_created] => WC_DateTime Object
                (
                    [utc_offset:protected] => 0
                    [date] => 2022-03-04 09:57:49.000000
                    [timezone_type] => 1
                    [timezone] => +00:00
                )

            [date_modified] => WC_DateTime Object
                (
                    [utc_offset:protected] => 0
                    [date] => 2022-03-04 09:57:51.000000
                    [timezone_type] => 1
                    [timezone] => +00:00
                )

            [status] => publish
            [featured] => 
            [catalog_visibility] => visible
            [description] => 
            [short_description] => 
            [sku] => 
            [price] => 60000
            [regular_price] => 109000
            [sale_price] => 60000
            [date_on_sale_from] => 
            [date_on_sale_to] => 
            [total_sales] => 0
            [tax_status] => taxable
            [tax_class] => 
            [manage_stock] => 
            [stock_quantity] => 
            [stock_status] => instock
            [backorders] => no
            [low_stock_amount] => 
            [sold_individually] => 
            [weight] => 
            [length] => 
            [width] => 
            [height] => 
            [upsell_ids] => Array
                (
                )

            [cross_sell_ids] => Array
                (
                )

            [parent_id] => 0
            [reviews_allowed] => 1
            [purchase_note] => 
            [attributes] => Array
                (
                )

            [default_attributes] => Array
                (
                )

            [menu_order] => 0
            [post_password] => 
            [virtual] => 
            [downloadable] => 
            [category_ids] => Array
                (
                    [0] => 20
                )

            [tag_ids] => Array
                (
                )

            [shipping_class_id] => 0
            [downloads] => Array
                (
                )

            [image_id] => 11
            [gallery_image_ids] => Array
                (
                    [0] => 11
                )

            [download_limit] => -1
            [download_expiry] => -1
            [rating_counts] => Array
                (
                )

            [average_rating] => 0
            [review_count] => 0
        )

    [supports:protected] => Array
        (
            [0] => ajax_add_to_cart
        )

    [id:protected] => 64
    [changes:protected] => Array
        (
        )

    [object_read:protected] => 1
    [extra_data:protected] => Array
        (
        )

    [default_data:protected] => Array
        (
            [name] => 
            [slug] => 
            [date_created] => 
            [date_modified] => 
            [status] => 
            [featured] => 
            [catalog_visibility] => visible
            [description] => 
            [short_description] => 
            [sku] => 
            [price] => 
            [regular_price] => 
            [sale_price] => 
            [date_on_sale_from] => 
            [date_on_sale_to] => 
            [total_sales] => 0
            [tax_status] => taxable
            [tax_class] => 
            [manage_stock] => 
            [stock_quantity] => 
            [stock_status] => instock
            [backorders] => no
            [low_stock_amount] => 
            [sold_individually] => 
            [weight] => 
            [length] => 
            [width] => 
            [height] => 
            [upsell_ids] => Array
                (
                )

            [cross_sell_ids] => Array
                (
                )

            [parent_id] => 0
            [reviews_allowed] => 1
            [purchase_note] => 
            [attributes] => Array
                (
                )

            [default_attributes] => Array
                (
                )

            [menu_order] => 0
            [post_password] => 
            [virtual] => 
            [downloadable] => 
            [category_ids] => Array
                (
                )

            [tag_ids] => Array
                (
                )

            [shipping_class_id] => 0
            [downloads] => Array
                (
                )

            [image_id] => 
            [gallery_image_ids] => Array
                (
                )

            [download_limit] => -1
            [download_expiry] => -1
            [rating_counts] => Array
                (
                )

            [average_rating] => 0
            [review_count] => 0
        )

    [data_store:protected] => WC_Data_Store Object
        (
            [instance:WC_Data_Store:private] => WC_Product_Data_Store_CPT Object
                (
                    [internal_meta_keys:protected] => Array
                        (
                            [0] => _visibility
                            [1] => _sku
                            [2] => _price
                            [3] => _regular_price
                            [4] => _sale_price
                            [5] => _sale_price_dates_from
                            [6] => _sale_price_dates_to
                            [7] => total_sales
                            [8] => _tax_status
                            [9] => _tax_class
                            [10] => _manage_stock
                            [11] => _stock
                            [12] => _stock_status
                            [13] => _backorders
                            [14] => _low_stock_amount
                            [15] => _sold_individually
                            [16] => _weight
                            [17] => _length
                            [18] => _width
                            [19] => _height
                            [20] => _upsell_ids
                            [21] => _crosssell_ids
                            [22] => _purchase_note
                            [23] => _default_attributes
                            [24] => _product_attributes
                            [25] => _virtual
                            [26] => _downloadable
                            [27] => _download_limit
                            [28] => _download_expiry
                            [29] => _featured
                            [30] => _downloadable_files
                            [31] => _wc_rating_count
                            [32] => _wc_average_rating
                            [33] => _wc_review_count
                            [34] => _variation_description
                            [35] => _thumbnail_id
                            [36] => _file_paths
                            [37] => _product_image_gallery
                            [38] => _product_version
                            [39] => _wp_old_slug
                            [40] => _edit_last
                            [41] => _edit_lock
                        )

                    [must_exist_meta_keys:protected] => Array
                        (
                            [0] => _tax_class
                        )

                    [extra_data_saved:protected] => 
                    [updated_props:protected] => Array
                        (
                        )

                    [meta_type:protected] => post
                    [object_id_field_for_meta:protected] => 
                )

            [stores:WC_Data_Store:private] => Array
                (
                    [coupon] => WC_Coupon_Data_Store_CPT
                    [customer] => WC_Customer_Data_Store
                    [customer-download] => WC_Customer_Download_Data_Store
                    [customer-download-log] => WC_Customer_Download_Log_Data_Store
                    [customer-session] => WC_Customer_Data_Store_Session
                    [order] => WC_Order_Data_Store_CPT
                    [order-refund] => WC_Order_Refund_Data_Store_CPT
                    [order-item] => WC_Order_Item_Data_Store
                    [order-item-coupon] => WC_Order_Item_Coupon_Data_Store
                    [order-item-fee] => WC_Order_Item_Fee_Data_Store
                    [order-item-product] => WC_Order_Item_Product_Data_Store
                    [order-item-shipping] => WC_Order_Item_Shipping_Data_Store
                    [order-item-tax] => WC_Order_Item_Tax_Data_Store
                    [payment-token] => WC_Payment_Token_Data_Store
                    [product] => WC_Product_Data_Store_CPT
                    [product-grouped] => WC_Product_Grouped_Data_Store_CPT
                    [product-variable] => WC_Product_Variable_Data_Store_CPT
                    [product-variation] => WC_Product_Variation_Data_Store_CPT
                    [shipping-zone] => WC_Shipping_Zone_Data_Store
                    [webhook] => WC_Webhook_Data_Store
                    [report-revenue-stats] => Automattic\WooCommerce\Admin\API\Reports\Orders\Stats\DataStore
                    [report-orders] => Automattic\WooCommerce\Admin\API\Reports\Orders\DataStore
                    [report-orders-stats] => Automattic\WooCommerce\Admin\API\Reports\Orders\Stats\DataStore
                    [report-products] => Automattic\WooCommerce\Admin\API\Reports\Products\DataStore
                    [report-variations] => Automattic\WooCommerce\Admin\API\Reports\Variations\DataStore
                    [report-products-stats] => Automattic\WooCommerce\Admin\API\Reports\Products\Stats\DataStore
                    [report-variations-stats] => Automattic\WooCommerce\Admin\API\Reports\Variations\Stats\DataStore
                    [report-categories] => Automattic\WooCommerce\Admin\API\Reports\Categories\DataStore
                    [report-taxes] => Automattic\WooCommerce\Admin\API\Reports\Taxes\DataStore
                    [report-taxes-stats] => Automattic\WooCommerce\Admin\API\Reports\Taxes\Stats\DataStore
                    [report-coupons] => Automattic\WooCommerce\Admin\API\Reports\Coupons\DataStore
                    [report-coupons-stats] => Automattic\WooCommerce\Admin\API\Reports\Coupons\Stats\DataStore
                    [report-downloads] => Automattic\WooCommerce\Admin\API\Reports\Downloads\DataStore
                    [report-downloads-stats] => Automattic\WooCommerce\Admin\API\Reports\Downloads\Stats\DataStore
                    [admin-note] => Automattic\WooCommerce\Admin\Notes\DataStore
                    [report-customers] => Automattic\WooCommerce\Admin\API\Reports\Customers\DataStore
                    [report-customers-stats] => Automattic\WooCommerce\Admin\API\Reports\Customers\Stats\DataStore
                    [report-stock-stats] => Automattic\WooCommerce\Admin\API\Reports\Stock\Stats\DataStore
                )

            [current_class_name:WC_Data_Store:private] => WC_Product_Data_Store_CPT
            [object_type:WC_Data_Store:private] => product-simple
        )

    [meta_data:protected] => 
)
</pre>

</body>

</html>