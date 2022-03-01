<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
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
    <section class="main-menu">
        <nav class="navbar p-0 m-0 navbar-expand-lg navbar-dark bg-dark ">
            <div class="container">
                <div class="navbar-toggler"    aria-expanded="false" aria-label="Toggle navigation">
                    <img class="w-100 h-100" src="<?php
                     header_image(); 
                     ?>"  alt="" />
                </div>
                <a class="navbar-brand" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php tstore_nav_bar(); ?>

                </div>
            </div>
        </nav>
    </section>