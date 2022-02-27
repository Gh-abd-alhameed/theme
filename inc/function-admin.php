<?php

/*
    @package maxart
*/

// Adding application pages in the control panel
function maxart_add_admin_page()
{

    add_menu_page(
        'MaxArt theme option',
        'maxart',
        'manage_options',
        'maxart_settings',
        'maxart_general_settings'
    );
    add_submenu_page(
        'maxart_setting',
        'General Settings',
        'General Settings',
        'manage_options',
        'maxart_submenu_settings',
        'maxart_general_settings'
    );

    add_submenu_page(
        'maxart_settings',
        'theme Support',
        'Theme Support',
        'manage_options',
        'maxart_submenu_theme_support',
        'maxart_submenu_theme_support',
        3
    );
    // register options maxart_custom_options
    add_action('admin_init', 'maxart_custom_options');
}
add_action('admin_menu', 'maxart_add_admin_page');


function maxart_custom_options()
{
    // Form General Settings
    add_settings_section('maxart-general-options', '', 'maxart_section_general_theme_settings', 'maxart_settings');
    // LOGO Register
    register_setting('maxart-settings-option', 'maxart_register_logo', 'maxart_settings_option_logo_verification');
    // SiteName Register
    register_setting('maxart-settings-option', 'maxart_register_namesite', 'maxart_settings_option_namesite_verification');
    // Facebook Register
    register_setting('maxart-settings-option', 'maxart_register_facebook', 'maxart_settings_option_facebook_verification');
    // Twitter Register
    register_setting('maxart-settings-option', 'maxart_register_twitter', 'maxart_settings_option_twitter_verification');
    // Logo Field
    add_settings_field(
        'maxart-field-Logo',
        'Logo Site',
        'maxart_field_logo',
        'maxart_settings',
        'maxart-general-options'
    );
    add_settings_field(
        'maxart-field-namesite',
        'Name Site',
        'maxart_field_namesite',
        'maxart_settings',
        'maxart-general-options'
    );
    // Facebook Field
    add_settings_field(
        'maxart-field-facebook',
        'Facebook',
        'maxart_field_facebook',
        'maxart_settings',
        'maxart-general-options'
    );
    // Twitter Field
    add_settings_field(
        'maxart-fidle-twitter',
        'Twitter',
        'maxart_field_twitter',
        'maxart_settings',
        'maxart-general-options'
    );
    // Form page Theme Support
    register_setting('maxart-theme-support-option', 'maxart_register_postformat');
    add_settings_section('maxart-section-theme-support-option', '', 'maxart_section_theme_support_settings', 'maxart_settings_theme_support');
}
/*
*   **********************
*       Register Function
*   **********************
*/
function maxart_settings_option_logo_verification($input)
{
    $errors = array();
    $allowed_extention = array('jpg', 'png', 'webp', 'gif','svg');
    if (isset($_FILES)) :
        $image = $_FILES['image_logo'];
        $image_name = $image['name'];
        $image_size = $image['size'] / 1024 / 1024;
        $image_tmp  = $image['tmp_name'];
        $image_extention = end(explode('.', $image_name));

        if (!in_array(strtolower($image_extention), $allowed_extention)) :
            $errors[] = '<div>Extension not available<div>';
        endif;
        if ($image_size > 3) :
            $errors[] = '<div>File size is large<div>';
        endif;
        if (empty($errors)) :
            $image_random_name = rand(0, 1000000000) . '.' . $image_extention;
            move_uploaded_file($image_tmp, WP_CONTENT_DIR . '/uploads/' . $image_random_name);
            $input = $image_random_name;
            return $input;
        else :
            foreach ($errors as $error) {
                echo $error;
            }
        endif;

    endif;

}
function maxart_settings_option_namesite_verification($input)
{
    $CHECK = array(
        '@', '/', '\\', '"', '\'', '|', '$', '.', ',', '(', ')', '!', '#', '%', '^', '&', ':',
        '*', '_', '+', '=', ';', 'HTTPS', 'https', 'http', 'http', '{', '}', '[', ']', '<', '>'
    );
    $input =  (!empty(@$input) ? str_replace($CHECK, '', trim(sanitize_text_field($input))) : '');
    return $input;
}
function maxart_settings_option_twitter_verification($input)
{

    $CHECK = array(
        '@', '/', '\\', '"', '\'', '|', '$', '.', ',', '(', ')', '!', '#', '%', '^', '&', ':',
        '*', '_', '+', '=', ';', 'HTTPS', 'https', 'http', 'http', '{', '}', '[', ']', '<', '>'
    );
    $input =  (!empty(@$input) ? str_replace($CHECK, '', trim(sanitize_text_field($input))) : '');
    return $input;
}
function maxart_settings_option_facebook_verification($input)
{
    $CHECK = array(
        '@', '/', '\\', '"', '\'', '|', '$', '.', ',', '(', ')', '!', '#', '%', '^', '&', ':',
        '*', '_', '+', '=', ';', 'HTTPS', 'https', 'http', 'http', '{', '}', '[', ']', '<', '>'
    );
    $input =  (!empty(@$input) ? str_replace($CHECK, '', trim(sanitize_text_field($input))) : '');
    return $input;
}
/*
*   **********************
*       Field Function
*   **********************
*/
// Output field maxart-field-logo
function maxart_field_logo()
{
    $logo_site = get_option('maxart_register_logo');
    
    $output = esc_attr ($logo_site);
    echo '<input type="file" name="image_logo">';
    echo '<input type="text" name="maxart_register_logo" hidden id="maxart_register_logo"  value= "' . $output . '">';
    
}
// Output field maxart-field-namesite
function maxart_field_namesite()
{
    $name_site = get_option('maxart_register_namesite');
    $output =  (!empty($name_site) ? esc_attr($name_site) : '');
    echo '<input type="text" name="maxart_register_namesite" id="maxart_register_namesite"  value= "' . $output . '">';
}
// Output field maxart-fidle-twitter
function maxart_field_twitter()
{
    $twitter_name = get_option('maxart_register_twitter');
    $output =  (!empty($twitter_name) ? esc_attr($twitter_name) : '');
    echo '<input type="text" name="maxart_register_twitter" id="maxart_register_twitter"  value= "' . $output . '">';
}
// Output field maxart-field-facebook
function maxart_field_facebook()
{
    $facebook_name = get_option('maxart_register_facebook');
    $output =  (!empty($facebook_name) ? esc_attr($facebook_name) : '');

    echo '<input type="text" name="maxart_register_facebook" id="maxart_register_facebook"  value= "' . $output . '">';
}

/*
*   **********************
*       Section Function
*   **********************
*/
// output section maxart-general-options
function maxart_section_general_theme_settings()
{

    echo '<h1> General Theme Settings </h1>';
}
// output section maxart-general-options
function maxart_section_theme_support_settings()
{

    echo '<h1>General Theme Support</h1>';
}
/*
*   **********************
*       Page Function
*   **********************
*/
// Output General Settings
function maxart_general_settings()
{
    require_once get_template_directory() . '/inc/tamplate/maxart-general-settings.php';
}
// Output Page Theme Support
function maxart_submenu_theme_support()
{
    require_once get_template_directory() . '/inc/tamplate/maxart-settings-theme-support.php';
}
