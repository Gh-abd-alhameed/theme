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

<body>