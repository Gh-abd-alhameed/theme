<?php
/*
    @package Maxart
*/
?>
<!-- product -->
<?php
global $product;

?>
<div class="col-lg-3 mb-4" style="width: 25rem;">
    <div class="card" style=" border:3px solid #8016A5;">
        <div class="swiper format-gallery card-img-top">
            <div class="swiper-wrapper">
                <?php

                $attachments = maxart_post_format_product();
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

        <div class="card-body w-100">
            <a href="<?php echo get_permalink($product->get_id()); ?>" style="text-decoration:none;">
                <h5 class="card-title pb-4"><?php echo $product->get_name(); ?></h5>
            </a>

            <div class="  d-flex flex-row justify-content-center align-items-center">
                <h6 class="box-price load py-2 px-2 fw-bold" style="border:1px dashed #adb5bd"><?php echo $product->get_price(); ?></h6>
                <img class="ms-auto" src="https://fastcarrental.ae/assets/img/whatsapp-icon.webp" style="width:30px ; height:30px;" alt="">
                <a href="#" class="btn btn-primary mx-auto py-auto">Book Now</a>

            </div>

        </div>
    </div>
</div>