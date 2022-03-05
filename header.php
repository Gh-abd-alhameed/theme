<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
   
    <?php if (is_singular() && pings_open(get_queried_object())) : ?>
        <link rel="pingback" href="<?php bloginfo("pingback"); ?>">
    <?php endif; ?>
    <title>
        <?php bloginfo("name"); ?>
        <?php wp_title('|', true, 'left'); ?>
    </title>
    <?php $custom_css = esc_attr(get_option('maxart_register_custom_css'));
    if (!empty($custom_css)) {
        echo '<style>' . $custom_css . '</style>';
    }
    ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



    <!-- Start appbar -->
    <section class="appbar">
        <div class='container'>
            <div class="row">
                <div class="col-10">
                    <?php $site_phone = get_option('maxart_register_phone_number');  ?>
                    <span> Phone: </span>
                    <a><?php echo $site_phone; ?></a>
                    <?php $site_watsapp = get_option('maxart_register_whatsapp');  ?>
                    <span class="ms-2"> WhatsApp: </span>
                    <a><?php echo $site_watsapp; ?></a>
                </div>
                <div class="col-2 ms-auto social-net">
                    <?php
                    $facebook = get_option('maxart_register_facebook');
                    $twitter = get_option('maxart_register_twitter');
                    ?>
                    <a href="https://facebook.com/<?php echo esc_attr($facebook); ?>"><i class="fa-brands fa-facebook-square" style="width: 25px; height:25px;"></i></a>
                    <a href="https://twitter.com/<?php echo esc_attr($twitter); ?>"><i class="fa-brands fa-twitter-square"style="width: 25px; height:25px;"></i></i></a>
                </div>
            </div> <!-- row -->
        </div><!-- container -->
    </section><!-- appbar -->
    <!-- end appbar -->
    <section id="main_menu" class="main-menu">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <?php
                $logo_url = content_url('uploads/') . get_option('maxart_register_logo');
                $logo = (!empty(get_option('maxart_register_logo')) ? $logo_url : get_template_directory_uri() . '/assets/img/logo.jpg');
                ?>
                <a href="<?php echo esc_url(get_bloginfo('url')) ?>"><div class="logo-site" style="background-image:url(<?php echo  esc_url($logo); ?>);"></div></a>


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button><!--  navbar-toggler -->
                <div class="collapse navbar-collapse " id="navbarNavDropdown">
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'Nav_menu',
                        'menu_class' => 'navbar-nav me-auto ms-auto mb-2 mb-lg-0',
                        'container' => '',
                        'walker' => new custom_menu(),
                    )); ?>
                    <div class="vr bg-transparent "></div>

                </div> <!-- collapse -->
            </div><!-- container -->
        </nav><!-- navbar -->
    </section>
    <!-- End Navbar -->
    


   