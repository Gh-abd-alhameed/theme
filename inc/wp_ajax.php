<?php




add_action('wp_ajax_maxart_remove_logo', 'maxart_remove_logo');

function maxart_remove_logo()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') :
        if (isset($_POST['imageremove'])) :
            $url = WP_CONTENT_DIR . '\\uploads\\';
            $image_name = $url . $_POST['imageremove'];
            if (file_exists($image_name)) :
                unlink($image_name);
                update_option('maxart_register_logo', '');
            endif;
        endif;
    endif;

    wp_die();
}
add_action('wp_ajax_nopriv_maxart_contact_us', 'maxart_contact_us');
add_action('wp_ajax_maxart_contact_us', 'maxart_contact_us');
function  maxart_contact_us()
{
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $name = wp_strip_all_tags($_POST['name']);
        $email = wp_strip_all_tags($_POST['email']);
        $phone = wp_strip_all_tags($_POST['phone']);
        $message = wp_strip_all_tags($_POST['message']);
        $args = array(
            'post_title' => $name,
            'post_content'=> "phone Number is: ".$phone . "\nthe message is :" . $message ,
            'post_type'=>'contact-us',
            'post_author'=>1,
            'meta_input'=>array(
                '_contact-email' => $email,
            )
        );
        $postID = wp_insert_post($args);
        echo $postID ;
        
    }else{
        echo 'البيانات غير صحيحة';
    }
}
