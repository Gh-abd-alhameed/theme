<?php
/*
    @package Maxart
*/
?>
<!-- product -->
<?php
global $product;

?>
<div class="col-xs-12  col-sm-6 col-md-6 col-lg-4 mb-3" >
    <div class="card" style=" border:3px solid #8016A5;">
        <div class="swiper format-gallery card-img-top">
            <div class="swiper-wrapper">
                <?php
                $attachments = maxart_post_format_product();
                if ($attachments) :
                    foreach ($attachments as $attachment) : ?>
                        <div class="swiper-slide">
                            <img src="<?php echo esc_url($attachment);?>" class="img-fluid" style="background-size: contain;background-repeat: no-repeat;" alt="">
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="card-body w-100">
            <a href="<?php echo get_permalink($product->get_id()); ?>" style="text-decoration:none;">
                <h5 class="card-title pb-4"><?php echo $product->get_name(); ?></h5>
            </a>

            <div class="  d-flex flex-row justify-content-center  align-items-center">
                <h6 class="box-price load my-auto py-2 px-2 fw-bold " style="border:1px dashed #adb5bd"><?php echo $product->get_price().' '.get_woocommerce_currency_symbol(); ?></h6>
                <i class="fa-brands fa-whatsapp ms-auto" style="width:30px;height:30px;"></i>
                <a href="<?php echo get_permalink($product->get_id()); ?>" class="btn btn-primary ms-3 py-auto">Book Now</a>
            </div>

        </div>
    </div>
</div>