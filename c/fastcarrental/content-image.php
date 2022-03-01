<!-- product -->

<div class="col-lg-3 mb-4"  style="width: 25rem;">
    <div class="card" style=" border:3px solid #8016A5;">
        <div class="swiper mySwiper card-img-top">
          <div class="swiper-wrapper">

      <?php  the_post_thumbnail('post-thumbnail',array('class'=>'img-responsive responsive--full','style'=>'min-width:400px;max-height:100% !important;')); ?>
          </div>
        </div>
        <div class="card-body w-100">
            <h5 class="card-title pb-4"><?php the_title(); ?></h5>

            <div class="  d-flex flex-row justify-content-center align-items-center">
                <h6 class="box-price load py-2 px-2 fw-bold" style="border:1px dashed #adb5bd"><?php echo the_excerpt(); ?></h6>
                <img class="ms-auto" src="https://fastcarrental.ae/assets/img/whatsapp-icon.webp"
                    style="width:30px ; height:30px;" alt="">
                <a href="#" class="btn btn-primary mx-auto py-auto">Book Now</a>

            </div>

        </div>
    </div>
</div>
