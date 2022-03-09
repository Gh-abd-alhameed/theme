<?php

/* 
@package Maxart
*/



function maxart_contact_us_shortcode($atts, $content = '')
{
    $atts = shortcode_atts(array(
        'class' => 'btn btn-primary',
    ), $atts,'contact');

    $output = '';
    $output .= '<div class="row w-100">';
    $output .= '<form class="col-lg-12" action="" method="get">';
    $output .= '<div class="row">';

    $output .='<div class="col-lg-4 mx-auto">';
    $output .= '<label class="color-white pb-3" for="yourname">Name *</label>';
    $output .='<input type="text" id="name-form-contact" class="form-control" require id="yourname" placeholder="Your Name" aria-label="First name" require>';
    $output .= '</div>';

    $output .= '<div class="col-lg-4 mx-auto">';
    $output .= '<label class="color-white pb-3" for="yournumber">Phone *</label>';
    $output .= '<input type="number" id="phone-form-contact" class="form-control" require id="yournumber" placeholder="Your Number" aria-label="Last name">';
    $output .= '</div>';

    $output .= '<div class="col-lg-4   mx-auto ">';
    $output .= '<label class="color-white pb-3" for="yourfavourite">email * </label>';
    $output .= '<input type="email" id="email-form-contact" require class="form-control" id="yourfavourite" placeholder="Your Number" aria-label="Last name">';
    $output .= '</div>';
    
    $output .= '<div class="divider my-auto  mx-auto"></div>';

    $output .= '<div class="col-lg-12 text-start ">';
    $output .= '<label class="color-white pb-3" for="yourmessag">Your Message</label>';
    $output .= '<input type="text" id="message-form-contact" class="form-control" require id="" placeholder="Your Message" aria-label="Last name" rows="3">';
    $output .= '</div>';
    
    $output .= '<div class="col-12 text-center">';
    $output .= '<div id="show-msg-form" class="alert w-100">';
    $output .= '<p class="load">There is an error in the data</p>';
    $output .= '</div>';
    $output .= '<input id="url-api" type="text" hidden data-url=" '. esc_attr(admin_url('admin-ajax.php')).'">';
    $output .= '<input id="phone-site-whatsapp" type="text" hidden data-whatsapp="'. esc_attr(get_option('maxart_register_whatsapp')).'">';
    $output .= '<a id="send-form-contact" class="btn btn-form-contact m-0" >Send</a>';
    $output .= '</div>';
    
    $output .= '</div>';
    $output .= '</form>';
    $output .= '</div>';
    return $output;
} 



add_shortcode('contact', 'maxart_contact_us_shortcode');

            
                
                    
                    

                   

                    

                    

                   
                    
           
       