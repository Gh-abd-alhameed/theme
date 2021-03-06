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
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message']) && !empty($_POST['phone'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $name = wp_strip_all_tags($_POST['name']);
        $email = wp_strip_all_tags($_POST['email']);
        $phone = wp_strip_all_tags($_POST['phone']);
        $message = wp_strip_all_tags($_POST['message']);
        $phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $args = array(
            'post_title' => $name,
            'post_content' => $message,
            'post_type' => 'contact-us',
            'post_status' => 'publish',
            'post_author' => 1,
            'meta_input' => array(
                '_contact-email' => $email,
                '_contact-phone' => $phone,
            )
        );
        $postID = wp_insert_post($args);
        echo $postID;
        if ($postID !== 0) {
            $to = get_bloginfo('admin_email');
            $subject = 'Maxart Contact From-' . $name;
            $headers[] = 'From:' . get_bloginfo('name') . '<' . $email . '>';
            $headers[] = 'Reply-To:' . $name . '<' . $email . '>';
            $headers[] = 'Content-Type:text/html;';
            $msg = '<dvi>';
            $msg .= '<h3>Form: </h3>' . '<h4>' . $name . '</h4>';
            $msg .= '</dvi>';
            $msg .= '<dvi>';
            $msg .= '<h3>Email: </h3>' . '<h4>' . $email . '</h4>';
            $msg .= '</dvi>';
            $msg .= '<dvi>';
            $msg .= '<h3>Phone: </h3>' . '<h4>' . $phone . '</h4>';
            $msg .= '</dvi>';
            $msg .= '<dvi>';
            $msg .= '<h3>Message: </h3>' . '<h4>' . $message . '</h4>';
            $msg .= '</dvi>';
            wp_mail($to, $subject, $msg,  $headers);
        }
    } else {
        echo "0";
    }
    wp_die();
}
// get product page
add_action('wp_ajax_nopriv_maxart_product_homepage', 'maxart_product_homepage');
add_action('wp_ajax_maxart_product_homepage', 'maxart_product_homepage');
function maxart_product_homepage()
{
    if (isset($_POST['page']) && !empty($_POST['page'])) {
        $page = $_POST['page'] + 1;
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 3,
            'paged' => $page,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'slug',
                    'terms'    => 'Tshirts',
                ),
            ),
        );
        $products = new WP_Query($args);
        if ($products->have_posts()) {
            while ($products->have_posts()) {
                $products->the_post();
                echo get_template_part('./templates/content', 'product');
            }
        } else {
            echo 0;
        }
        wp_reset_postdata();
    } else {
        echo 0;
    }
    wp_die();
}
