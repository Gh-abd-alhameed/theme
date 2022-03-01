<?php




$get_option_post_formate = get_option('maxart_register_post_format');
if (!empty($get_option_post_formate)) {
    add_action('init', 'maxart_add_theme_support_post_formats');
}
// check option post type

// Add Post Format
function maxart_add_theme_support_post_formats()
{
    $option_post_format = get_option('maxart_register_post_format');
    $post_format = [];
    foreach ($option_post_format as $key => $value) :
        $post_format[] = $key;
    endforeach;
    add_theme_support('post-formats', $post_format);
}
$get_option_post_type = get_option('maxart_register_contact_us');
if (!empty($get_option_post_type)) {
    add_action('init', "maxart_register_post_type");
    add_filter('manage_contact-us_posts_columns', 'maxart_reset_contact_columns');
    add_filter('manage_contact-us_posts_custom_column', 'maxart_set_contact_columns', 10, 2);
    
    
}
//add post type Contact Us
function maxart_register_post_type()
{
    $labels = array(
        'name'          => 'Contact us',
        'add_new'       => 'Add Message',
        'add_new_item' => 'Add New Message',
        'edit_item'     => 'edit msg',
        'new_item'      => 'new message',
        'view_item'     => 'view message',
        'view_items'    => 'view Messages',
        'search_items'  => 'Search for messages',
        'not_found'     => 'No message found',
        'all_items'     => 'All Messages',
        'not_found_in_trash' => 'No message found in trash',
        'exclude_from_search' => true,
        'public' => true,
    );
    $args = array(
        'labels' => $labels,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array('title', 'editor'),
        'menu_icon' => 'dashicons-format-status',
        'show_in_rest' => true
    );
    register_post_type('contact-us', $args);
}
// edit columns in post type contact us 
function maxart_reset_contact_columns($columns)
{
    $columns = array();
    $columns['title'] = 'Full Name';
    $columns['message'] = 'Message';
    $columns['email'] = 'Email';
    $columns['date'] = 'Date';
    return $columns;
}

// set custom columns contact us 
function maxart_set_contact_columns($columns, $post_id)
{
    switch ($columns) {
        case 'message':
            echo get_the_excerpt($post_id);
            break;
        case 'email':
            echo get_post_meta($post_id, '_contact-email', true);
            break;
    }
}
// add custom meta box 
function maxart_custom_box_meta()
{
    add_meta_box('contact_email', 'email', 'maxart_custom_box_meta_callback', 'contact-us', 'side', 'default');
}
add_action('add_meta_boxes_contact-us', 'maxart_custom_box_meta');
function maxart_custom_box_meta_callback($post)
{
    wp_nonce_field('maxart_save_email_data', 'maxart_wp_nonce_name_metabox_email');
    $value = get_post_meta($post->ID, '_contact-email', true);
    echo '<label for="maxart_wp_nonce_name_metabox_email">User email adress</label>';
    echo '<input type="email" id="maxart_wp_nonce_name_metabox_email" name="maxart_name_input_val" value="'.esc_attr($value).'" size="25"/>';
}

function maxart_wp_nonce_action_metabox_email($post_id)
{
    if (!isset($_POST['maxart_wp_nonce_name_metabox_email'])) {
        return ;
    }
    if (!wp_verify_nonce($_POST['maxart_wp_nonce_name_metabox_email'], 'maxart_save_email_data')) {
        return ;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return ;
    }
    $data =  $_POST['maxart_name_input_val'];
    $my_data = sanitize_text_field($data);
    update_post_meta($post_id, '_contact-email', $my_data);
}
add_action('save_post_contact-us', 'maxart_wp_nonce_action_metabox_email');

// add theme support mix
function maxart_add_theme_support_others()
{
    add_theme_support('post-thumbnails');
    add_image_size('homepage-thumb', 220, 180, true);
    $defaults_custom_headers = array(
        'default-image'          => '',
        'random-default'         => false,
        'width'                  => 400,
        'height'                 => 600,
        'flex-height'            => false,
        'flex-width'             => false,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
        'wp-head-callback'       => '',
        'admin-head-callback'    => '',
        'admin-preview-callback' => '',
        'video'                  => true,
        'video-active-callback'  => 'is_front_page',
    );
    add_theme_support('custom-header', $defaults_custom_headers);
    $array_custom_background = array(
        'default-color'          => '',
        'default-image'          => '',
        'default-preset'         => 'default', // 'default', 'fill', 'fit', 'repeat', 'custom'
        'default-position-x'     => 'center',    // 'left', 'center', 'right'
        'default-position-y'     => 'top',     // 'top', 'center', 'bottom'
        'default-size'           => 'contain',    // 'auto', 'contain', 'cover'
        'default-repeat'         => 'no-repeat',  // 'repeat-x', 'repeat-y', 'repeat', 'no-repeat'
        'default-attachment'     => 'scroll',  // 'scroll', 'fixed'
        'admin-head-callback'    => '',
        'admin-preview-callback' => ''
    );
    add_theme_support('custom-background', $array_custom_background);
}

add_action('after_setup_theme', 'maxart_add_theme_support_others');
