<!DOCTYPE html>
<html <?php language_attributes(  ); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="pingback" href="<?php bloginfo("pingback"); ?>">
    <title>
        <?php bloginfo("name"); ?>
        <?php wp_title('|', true, 'left'); ?>
    </title>
    <?php wp_head(); ?>
</head>
<body>


  <!-- Start Navbar -->
<section id="main_menu" class="main-menu fixed-top">
    <nav class=" navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand text-center" href="#">
                <img class="img w-60 h-60  my-auto" src="https://fastcarrental.ae/assets/img/logo.svg" alt=""
                    height="80px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavDropdown">
                <?php set_menu(); ?>
                <div class="vr bg-transparent "></div>
                <div class="Contact">
                    <h3 class="btn">
                        <i class="fa fa-phone fa-lg " aria-hidden="true"></i>
                        +971 52 266 5566
                    </h3>
                    <i class="fa fa-whatsapp fa-2x ps-3 my-auto" aria-hidden="true"></i>
                </div>

            </div>

        </div>
    </nav>
</section>
<!-- End Navbar -->
