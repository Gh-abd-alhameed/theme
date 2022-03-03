<?php
/*
    @package Maxart
*/
?>
<!-- product -->

<div class="col-lg-3 mb-4" style="width: 25rem;">
    <div class="card" style=" border:3px solid #8016A5;">
        <div class="swiper format-gallery card-img-top">
            <div class="swiper-wrapper">
                <?php
                $attachments = maxart_post_format_gallery(3,get_the_ID()); ?>
                <?php
                if ($attachments > 1) :
                    foreach ($attachments as $attachment) :
                ?>
                        <div class="swiper-slide">
                            <img src="<?php echo wp_get_attachment_url($attachment->ID); ?>" class="img-fluid"style="background-size: contain;background-repeat: no-repeat;" alt="">
                        </div>
                    <?php
                    endforeach;
                elseif ($attachments == 1) :
                    ?>
                    <div class="swiper-slide">
                        <img src="<?php echo $attachments; ?>" class="img-fluid" style="background-size: contain;background-repeat: no-repeat;" alt="">
                    </div>
                <?php
                endif;
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="card-body w-100">
            <h5 class="card-title pb-4"><?php the_title(); ?></h5>

            <div class="  d-flex flex-row justify-content-center align-items-center">
                <h6 class="box-price load py-2 px-2 fw-bold" style="border:1px dashed #adb5bd"><?php echo the_excerpt(); ?></h6>
                <img class="ms-auto" src="https://fastcarrental.ae/assets/img/whatsapp-icon.webp" style="width:30px ; height:30px;" alt="">
                <a href="#" class="btn btn-primary mx-auto py-auto">Book Now</a>

            </div>

        </div>
    </div>
</div>