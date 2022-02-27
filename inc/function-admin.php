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
    add_submenu_page(
        'maxart_settings',
        'Custom CSS',
        'Custom CSS',
        'manage_options',
        'maxart_submenu_custom_css',
        'maxart_submenu_custom_css',
        4
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
    // Form Page Custom CSS  
    register_setting('maxart-register-custom-css-option', 'maxart_register_custom_css' ,'maxart_settings_option_custom_css_verification');
    add_settings_section('maxart-section-custom-css-option', '', 'maxart_section_custom_css_settings', 'maxart_submenu_custom_css');
    // TextArea  Field
    add_settings_field(
        'maxart-fidle-custom-css',
        'CSS',
        'maxart_field_custom_css',
        'maxart_submenu_custom_css',
        'maxart-section-custom-css-option'
    );
}
/*
*   **********************
*       Register Function
*   **********************
*/
function maxart_settings_option_logo_verification($input)
{
    $errors = array();
    $allowed_extention = array('jpg', 'png', 'webp', 'gif', 'svg');
    if (isset($_FILES['image_logo'])) :
        $image = $_FILES['image_logo'];
        $image_name = $image['name'];
        $image_size = $image['size'] / 1024 / 1024;
        $image_tmp  = $image['tmp_name'];
        $image_extention = end(explode('.', $image_name));

        if (!in_array(strtolower($image_extention), $allowed_extention)) :
            $errors[] = '<div>Extension not available<div>';
            return "Extension";
        endif;
        if ($image_size > 3) :
            $errors[] = '<div>File size is large<div>';
            return "size";
        endif;
        if (empty($errors)) :
            $image_random_name = rand(0, 1000000000) . '.' . $image_extention;
            move_uploaded_file($image_tmp, WP_CONTENT_DIR . '/uploads/' . $image_random_name);
            $input = $image_random_name;
            return $input;
        else :
            foreach ($errors as $error) {
                echo $error;
                return "not empty in under random name";
            }
        endif;
    else :

        $file_url =  WP_CONTENT_DIR . '\\uploads\\' .  get_option('maxart_register_logo');
        if (file_exists($file_url)) {
            $input = get_option('maxart_register_logo');
            return $input;
        } else {
            return '';
        }

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
    if (empty($logo_site)) :
        $output = esc_attr($logo_site);
        echo '<input type="file" name="image_logo">';
        echo '<input type="text" name="maxart_register_logo" hidden id="maxart_register_logo"  value= "' . $output . '">';
    else :
        $logo_image =  esc_url(content_url('uploads/') . $logo_site);
        echo '<div class="co-box">' ; 
        echo '<div class="img-thumbnail logo-img" style="background-image:url(' . esc_url($logo_image) . ');"></div><a data-image="' . esc_attr($logo_site) . '" class="btn btn-danger deleate-btn" data-url="' . esc_url(__(admin_url('admin-ajax.php'))) . '" id="remove_logo_site">Delete</a>';
        echo "</div>";
    endif;
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
// Output field maxart-field-Custom-CSS
function maxart_field_custom_css()
{
    $css =  get_option('maxart_register_custom_css') ;
    $value = (!empty($css) ? esc_attr($css) : '');
    // echo '<input type="text" name="maxart_register_custom_css" id="maxart_register_custom_css" value="'. $value .'" />';
    echo '<div id="editor">ghadeer</div>';
    echo '<textarea id="maxart_register_custom_css" name="maxart_register_custom_css" rows="4" cols="50">'. $value .'</textarea>';
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
// output section maxart-theme-support-option
function maxart_section_theme_support_settings()
{

    echo '<h1>General Theme Support</h1>';
}
// output section maxart-custom-css-option 
function maxart_section_custom_css_settings()
{

    echo '<h1>Custom CSS settings</h1>';
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
// Output Page Custom CSS
function maxart_submenu_custom_css()
{
    require_once get_template_directory() . '/inc/tamplate/maxart-submenu-custom-css.php';
}
