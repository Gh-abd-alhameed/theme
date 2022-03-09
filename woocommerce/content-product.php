<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
	return;
}


$attachments = maxart_post_format_product();
?>

<div class="col-xs-12 col-md-6 col-lg-4  mb-4 " <?php wc_product_class('', $product); ?>>
	<div class="card" style=" border:3px solid #8016A5;">
	<?php $class_swiper = (count($attachments) > 1)? ' format-gallery ' : " format-image " ?>
		<div class="swiper <?php echo $class_swiper ?> card-img-top">
			<div class="swiper-wrapper">

				<?php
				/**
				 * Hook: woocommerce_before_shop_loop_item.
				 *
				 * @hooked woocommerce_template_loop_product_link_open - 10
				 */
				do_action('woocommerce_before_shop_loop_item');

				/**
				 * Hook: woocommerce_before_shop_loop_item_title.
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				// do_action('woocommerce_before_shop_loop_item_title');
				
				if ($attachments) :
					foreach ($attachments as $attachment) : ?>
						<div class="swiper-slide">
							<img src="<?php echo esc_url($attachment); ?>" class="img-fluid" style="background-size: contain;background-repeat: no-repeat;" alt="">
						</div>
				<?php
					endforeach;
				endif;
				?>
			</div>
			<div class="swiper-pagination"></div>
		</div>

		<div class="card-body w-100" style="pading:5px;">
			<?php
			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action('woocommerce_shop_loop_item_title');
			?>
			
			<div class=" d-flex flex-row justify-content-center  align-items-center"style="margin:5px">
				<?php
				/**
				 * Hook: woocommerce_after_shop_loop_item_title.
				 *
				 * @hooked woocommerce_template_loop_rating - 5
				 * @hooked woocommerce_template_loop_price - 10
				 */
				do_action('woocommerce_after_shop_loop_item_title');?>
				<i class="fa-brands fa-whatsapp ms-auto" style="width:30px;height:30px;"></i>
				<?php 
				/*
				 * Hook: woocommerce_after_shop_loop_item.
				 *
				 * @hooked woocommerce_template_loop_product_link_close - 5
				 * @hooked woocommerce_template_loop_add_to_cart - 10
				 */
				do_action('woocommerce_after_shop_loop_item');
				?>
			</div>

		</div>




	</div>
</div>