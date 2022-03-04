<?php


/*
    @package Maxart
*/



function maxart_post_format_image()
{

    $featured_image = '';
    if (has_post_thumbnail()) {
        $featured_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
    } else {
        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'posts_pre_page' => 1,
            'post_parent' => get_the_ID(),
        ));
        if ($attachments) {
            foreach ($attachments as $attachment) {
                $featured_image = wp_get_attachment_url($attachment->ID);
            }
        }
        wp_reset_postdata();
    }
    return $featured_image;
}
// get Attachment from post
function maxart_post_format_gallery($num, $post_id)
{

    $output = '';
    if (has_post_thumbnail() && $num == 1) {
        $output = wp_get_attachment_url(get_post_thumbnail_id($post_id));
    } else {
        $attachments = get_posts(array(
            'post_type' => 'attachment',
            'posts_pre_page' => $num,
            'post_parent' => $post_id,
        ));
        if ($attachments && $num == 1) {
            foreach ($attachments as $attachment) {
                $output = wp_get_attachment_url($attachment->ID);
            }
        } elseif ($attachments && $num > 1) {
            $output = $attachments;
        }
        wp_reset_postdata();
    }
    return $output;
}

// get Attachment from product
function maxart_post_format_product()
{
    global $product;
    $output = array();
    if ($product->get_image_id()) {
        $output[] = wp_get_attachment_url($product->get_image_id());
    }
    if ($product->get_gallery_image_ids()) {
        $attachments = $product->get_gallery_image_ids();
        foreach ($attachments as $attachment) {
            $output[] = wp_get_attachment_url($attachment);
        }
    }
    return $output;
    
}

