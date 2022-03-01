<?php
/* 
        @package maxart
    */
get_header();
?>






<section class="header d-flex flex-column justify-content-center align-items-center " style="background-image:url(<?php echo get_header_image() ?>)">
    <div class="container  d-flex flex-column align-items-center justify-content-center  h-100">
        <h1 class="fw-bold ">Fast Car Rental Dubai</h1>
        <p class="lead text-break ">Dreams do come true in the world of cars. At Fast Car Rental Dubai, your dream
            car is one click away.</p>
        <div class="row ">
            <form class="col-lg-12" action="" method="get">
                <div class="row">
                    <div class="col-lg-4   mx-auto">
                        <label class="color-white pb-3" for="yourname">Name *</label>
                        <input type="text" id="name-form-contact" class="form-control" require id="yourname" placeholder="Your Name" aria-label="First name" require>
                    </div>

                    <div class="vr my-auto"></div>

                    <div class="col-lg-4   mx-auto  ">
                        <label class="color-white pb-3" for="yournumber">Phone *</label>
                        <input type="text" id="phone-form-contact" class="form-control" require id="yournumber" placeholder="Your Number" aria-label="Last name">
                    </div>

                    <div class="vr  my-auto"></div>

                    <div class="col-lg-4   mx-auto ">
                        <label class="color-white pb-3" for="yourfavourite">email * </label>
                        <input type="text" id="email-form-contact" require class="form-control" id="yourfavourite" placeholder="Your Number" aria-label="Last name">
                    </div>

                    <div class="divider my-auto  mx-auto"></div>

                    <div class="col-lg-12 text-start ">
                        <label class="color-white pb-3" for="yourmessag">Your Message</label>
                        <input type="text" id="message-form-contact" class="form-control" require id="" placeholder="Your Message" aria-label="Last name" rows="3">
                    </div>
                    <div class="col-12">
                        <input id="url-api" type="text" hidden data-url="<?php echo esc_attr(admin_url('admin-ajax.php')) ; ?>">
                        <a href="#"id="send-form-contact" class="btn-form-contact">Send</a>
                    </div>
            </form>
        </div>

    </div>
</section>
<!-- Section Best Modified Cars -->








<?php get_footer(); ?>