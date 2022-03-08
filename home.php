<?php
/* 
Template Name: HomePage 
@package maxart

*/
get_header();
?>



<section class="header d-flex flex-column justify-content-center align-items-center " style="background-image:url(<?php echo get_header_image() ?>)">
    <div class="container  d-flex flex-column align-items-center justify-content-center  h-100">
        <h1 class="fw-bold ">Fast Car Rental Dubai</h1>
        <p class="lead text-break ">Dreams do come true in the world of cars. At Fast Car Rental Dubai, your dream
            car is one click away.</p>



        <div class="row w-100">
            <form class="col-lg-12" action="" method="get">
                <div class="row">


                    <div class="col-lg-4   mx-auto">
                        <label class="color-white pb-3" for="yourname">Name *</label>
                        <input type="text" id="name-form-contact" class="form-control" require id="yourname" placeholder="Your Name" aria-label="First name" require>
                    </div>

                    <div class="vr my-auto"></div>

                    <div class="col-lg-4   mx-auto  ">
                        <label class="color-white pb-3" for="yournumber">Phone *</label>
                        <input type="number" id="phone-form-contact" class="form-control" require id="yournumber" placeholder="Your Number" aria-label="Last name">
                    </div>

                    <div class="vr  my-auto"></div>

                    <div class="col-lg-4   mx-auto ">
                        <label class="color-white pb-3" for="yourfavourite">email * </label>
                        <input type="email" id="email-form-contact" require class="form-control" id="yourfavourite" placeholder="Your Number" aria-label="Last name">
                    </div>

                    <div class="divider my-auto  mx-auto"></div>

                    <div class="col-lg-12 text-start ">
                        <label class="color-white pb-3" for="yourmessag">Your Message</label>
                        <input type="text" id="message-form-contact" class="form-control" require id="" placeholder="Your Message" aria-label="Last name" rows="3">
                    </div>
                    <div class="col-12">
                        <div id="show-msg-form" class="alert w-100">
                            <p class="load">There is an error in the data</p>
                        </div>
                        <input id="url-api" type="text" hidden data-url="<?php echo esc_attr(admin_url('admin-ajax.php')); ?>">

                        <a id="send-form-contact" class="btn btn-form-contact" style="background-color:#8016a5;color:white;font-weight:bold;">Send</a>
                    </div>
            </form>
        </div>

    </div>
</section>
<!-- Section Best Modified Cars -->


<!-- Section Best Modified Cars -->

<section class="best-modified-cars" style="background-color: #0d0d19;">
    <div class="container text-center pt-5">
        <h1 class=" fw-bold" style="color:#8016A5;">Best Modified Cars</h1>
        <p class="load pb-4 text-light">Which car speaks to you?</p>
        <div id="print_data" data-product="best-cars" class="row justify-content-start ">

            <?php
            global $product;
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 6,
                'paged' => 1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field'    => 'slug',
                        'terms'    => 'Tshirts',
                    ),
                ),

            );
            $loop = new WP_Query($args);
            if ($loop->have_posts()) :
                while ($loop->have_posts()) : $loop->the_post();
                    get_template_part('templates/content', 'product');
                endwhile;
            else :
                do_action('woocommerce_no_products_found');
            endif;
            wp_reset_postdata();
            ?>
        </div>

        <div class="row">
            <div id="msg_api" class="col-12  bg-danger text-center m-3 p-1 " style="display: none; ">
                <p class="load" style="font-weight:bold;  color:white;">no products</p>
            </div>
            <div class="col-12">

                <a id="load_more" class="btn mx-auto" style="color: white;font-weight:bold;background-color:#8016A5; width:fit-content;" data-page="1" data-url="<?php echo esc_url(admin_url('admin-ajax.php')); ?>">
                    load more
                    <!-- <img  src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon/arrows-rotate.svg');  ?>" style="width:40px; height:40px;""  alt=""> -->
                </a>

            </div>
        </div>


    </div>
</section>

<!-- A unique Adventure -->


<section class="unique-adventure" style="background-color: #0d0d19;">
    <div class="container text-center pt-5 pb-5">
        <h1 style="color :#8016A5">A unique Adventure</h1>
        <div class="divider mx-auto rounded-3 w-25 p-1 bg-light "></div>
        <p class="load text-light pb-5 pt-3">Sit comfortably in the backseat and let our Chauffeur service handle
            all the traffic, parking, and steering issues. Enjoy every ride.</p>
        <div class="row ">
            <div class="col-lg-3 text-center  ">

                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon7.webp'); ?>" style="width:65px;height:65;" alt="">
                <p class="text-light  load fw-bold">Unbeatable Prices</p>
                <p class="load text-light" style="font-size:15px;">Satisfy yourself with unbeatable rental prices
                    around the UAE with reasonable prices and long-term deals.</p>
            </div>
            <div class="col-lg-3 text-center" style="border-left: 2px solid white;">

                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon8.webp'); ?>" style="width:65px;height:65;" alt="">
                <p class="text-light load fw-bold">Your Choice of Professionalism</p>
                <p class="load text-light" style="font-size:15px;">Add a touch of comfort to your experience with
                    our professional team. Your admired model comes with ease.</p>
            </div>

            <div class="col-lg-3 text-center load " style=" border-left: 2px solid white;">

                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon9.webp'); ?>" style="width:65px;height:65;" alt="">
                <p class="text-light  load fw-bold">Suits Every Budget</p>
                <p class="load text-light" style="font-size:15px;">If you dream it, we have it for you. Rent your
                    desired model with your type of budget, no one else's.</p>
            </div>

            <div class="col-lg-3 text-center " style="border-left: 2px solid white;">

                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/icon10.webp'); ?>" style="width:65px;height:65;" alt="">
                <p class=" load text-light fw-bold">24/7 Assistance</p>
                <p class="load text-light" style="font-size:15px;">Hit our hotline for any kind of emergency. We are
                    always here to help fast and skillfully!</p>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section class="about">
    <div class="container text-center pt-5 pb-5">
        <div class="row">
            <!-- start one -->

            <div class="col-lg-6 pe-3 ">
                <div class="scale">

                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/s1.webp') ?>" class="img-fluid" alt="">
                </div>

            </div>
            <div class="col-lg-6 p-0 align-self-center ">
                <div class="arrow-before px-5 py-3">
                    <h1 class="fw-bold text-light text-sm-start ">Your Car With A Chauffeur</h1>
                    <p class="load text-light text-sm-start">Riding your dream car is excellent but
                        not as perfect as appreciating every second while knowing
                        a professional chauffeur is there for the rescue! We offer
                        our chauffeur service for you to enhance your quality time and
                        enjoy the UAE's beauty within every ride. This luxury service
                        is ideal for those seeking joy through their adventure. With
                        our cars and remarkable assistance, there's nothing to worry
                        about. Don't let anything hold you back from ordering your
                        preferred luxury car model and enjoying a great ride around
                        the UAE with maximum satisfaction with Fast Rent A Car.</p>
                </div>

            </div>

            <!-- End one -->
            <div class="col-12 p-3"></div>
            <!-- start two -->
            <div class="col-lg-6 p-0 align-self-center ">
                <div class="arrow-after px-5 py-3 bg-light">
                    <h1 style="color:#8016A5" class="fw-bold  text-sm-start ">Ride with Luxury in a Limousine</h1>
                    <p class="load  text-sm-start" style="color:#8016A5">Boost your adventure and enjoy a stunning
                        experience inside
                        a Limousine that looks and feels most remarkably. Our Limousines are chosen from high-tech
                        and
                        most admirable cars to present you with the chance to fill your adventure with luxury and
                        ease.
                        This luxury service suits every business person, date, a person who seeks unique
                        experiences,
                        and special events. Flatter your time and satisfy your inner chick personality with our
                        Limousine
                        service. Don't forget to appreciate every second of every ride in the UAE with your favorite
                        ones!
                        Are you ready to feel the joy and create some excellent memories?</p>
                </div>

            </div>
            <div class="col-lg-6 ps-3 ">
                <div class="scale">

                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/luxury-in-a-limousine.webp'); ?>" class="img-fluid" alt="">
                </div>

            </div>
            <!-- End Two -->
            <div class="col-12 p-3"></div>
            <!-- start three -->
            <div class="col-lg-6 pe-3 ">
                <div class="scale">

                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/plane.webp'); ?>" class="img-fluid" alt="">
                </div>

            </div>
            <div class="col-lg-6 p-1 align-self-center ">
                <div class="arrow-before px-5 py-3">
                    <h1 class="fw-bold text-light text-sm-start ">Airport Pick-Up & Drop-Off</h1>
                    <p class="load text-light text-sm-start">Seeking a great adventure is all about starting and
                        ending it with luxury.
                        We offer you the airport pick-up and drop-off service to fill your time with maximum joy.
                        Why waste your time
                        finding a cab when you can get it with utmost ease and comfort with our services? Our
                        professional team will
                        ensure your trip starts with elegance and ends with satisfaction in Dubai. This beneficial
                        service is offered
                        whenever you need, and anywhere you desire with a team of professional chauffeurs who have
                        punctual driving
                        experience. With such service, there's nothing to worry about! Sit back and enjoy your
                        ride..</p>
                </div>

            </div>
            <!-- end three -->
            <!-- start four  -->
            <!-- start four  -->
            <div class="col-lg-6 p-0 align-self-center ">
                <div class="arrow-after px-5 py-3 bg-light">
                    <h1 style="color:#8016A5" class="fw-bold  text-sm-start ">Monthly Deals</h1>
                    <p class="load  text-sm-start" style="color:#8016A5">Our professional team aims to present every
                        client with the best deal he admires. Our monthly sales come with competitive prices with
                        every marvelous car model of the vast collection we offer. Whether you're seeking daily,
                        weekly, monthly, or yearly rental deals, we are here to provide you with what you desire,
                        ideally without the need to waste your money. We put our sales perfectly to meet every
                        budget
                        and present our clients with comfort at the same time. We will ensure you enjoy a marvelous
                        experience in the great city of the UAE with Fast Rent A Car.</p>
                </div>

            </div>
            <div class="col-lg-6 ps-3 ">
                <div class="scale">

                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/monthly-deal.webp'); ?>" class="img-fluid" alt="">
                </div>

            </div>
            <!-- end four  -->
        </div>
    </div>
</section>


<?php get_footer(); ?>