<?php




add_action('wp_ajax_maxart_remove_logo', 'maxart_remove_logo');

function maxart_remove_logo()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') :
        if (isset($_POST['imageremove'])) :
            $url = WP_CONTENT_DIR . '\\uploads\\'  ;
            $image_name = $url . $_POST['imageremove'];
            if (file_exists($image_name)) :
                unlink($image_name);
            endif;
        endif;
    endif;

    wp_die();
}
