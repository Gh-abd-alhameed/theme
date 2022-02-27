<?php



add_action('wp_ajax_nopriv_maxart_remove_logo', 'maxart_remove_logo');
add_action('wp_ajax_maxart_remove_logo', 'maxart_remove_logo');

function maxart_remove_logo()
{




    echo '<div>error</div>';

    // echo '<div>'. $image_name .'</div>' ; 
    wp_die();
}
