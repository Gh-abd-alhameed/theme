<?php



class maxart_custom_widget extends WP_Widget
{

    public function __construct()
    {
        $widget_ops = array(
            'classname' => '',
            'discription' => ''
        );
        parent::__construct('Get-In-Touch', 'Get In Touch', $widget_ops);
    }


    // Back-end display of widget
    public function Form($instanse)
    {
        $title = (!empty($instance['title']))?$instance['title'] : 'Get In Touch';
        $address =  (!empty($instanse['address']))? $instanse['address'] : 'address';
        $phone =  (!empty($instanse['phone'])) ? $instanse['phone'] : get_option('maxart_register_phone_number');
        $phone2 =  (!empty($instanse['phone2'])) ? $instanse['phone2'] : 'Phone 2 ';
        $email =  (!empty($instanse['email'])) ? $instanse['email'] : get_bloginfo('admin_email');
        $city =  (!empty($instanse['city'])) ? $instanse['city'] : 'city';
        $street =  (!empty($instanse['street']) )? $instanse['street'] : 'street';
        $output = '';
        $output .= '<ifram>';
        $output .= '<form>';
        $output .= '<label for="' . $this->get_field_id('address') . '">Address: </label>';
        $output .= '<input type="text" class="components-placeholder__input" name="' . $this->get_field_name('address') . '" id="' . $this->get_field_id('address') . '" value="' . $address . '">';
        $output .= '<label for="' . $this->get_field_id('phone') . '">Phone: </label>';
        $output .= '<input type="text" class="components-placeholder__input" name="' . $this->get_field_name('phone') . '" id="' . $this->get_field_id('phone') . '" value="' . $phone . '">';
        $output .= '<label for="' . $this->get_field_id('phone2') . '">Phone2: </label>';
        $output .= '<input type="text" class="components-placeholder__input" name="' . $this->get_field_name('phone2') . '" id="' . $this->get_field_id('phone2') . '" value="' . $phone2 . '">';
        $output .= '<label for="' . $this->get_field_id('email') . '">Email: </label>';
        $output .= '<input type="text" class="components-placeholder__input" name="' . $this->get_field_name('email') . '" id="' . $this->get_field_id('email') . '" value="' . $email . '">';
        $output .= '<label for="' . $this->get_field_id('city') . '">City: </label>';
        $output .= '<input type="text" class="components-placeholder__input" name="' . $this->get_field_name('city') . '" id="' . $this->get_field_id('city') . '" value="' . $city . '">';
        $output .= '<label for="' . $this->get_field_id('street') . '">Street: </label>';
        $output .= '<input type="text" class="components-placeholder__input" name="' . $this->get_field_name('street') . '" id="' . $this->get_field_id('street') . '" value="' . $street . '">';
        $output .= '<button type="button" class="components-button block-editor-media-placeholder__button block-editor-media-placeholder__upload-button is-primary">Embed</button>';
        $output .= '</form>';
        $output .= '</ifram>';
        echo $output;
    }
    //output Back-end function
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['address'] = ( !empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
        $instance['phone'] = ( !empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : get_option('maxart_register_phone_number');
        $instance['phone2'] = ( !empty( $new_instance['phone2'] ) ) ? strip_tags( $new_instance['phone2'] ) : '';
        $instance['email'] = ( !empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : get_bloginfo('admin_email');
        $instance['city'] = ( !empty( $new_instance['city'] ) ) ? strip_tags( $new_instance['city'] ) : '';
        $instance['street'] = ( !empty( $new_instance['street'] ) ) ? strip_tags( $new_instance['street'] ) : '';
        return $instance;
    }
    // Front-end display of widget
    public function widget($args, $instance)
    {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '' ;
        $address =  (!empty($instanse['address']))? $instanse['address'] : 'address';
        $phone =  (!empty($instanse['phone'])) ? $instanse['phone'] : get_option('maxart_register_phone_number');
        $phone2 =  (!empty($instanse['phone2'])) ? $instanse['phone2'] : 'Phone 2 ';
        $email =  (!empty($instanse['email'])) ? $instanse['email'] : get_bloginfo('admin_email');
        $city =  (!empty($instanse['city'])) ? $instanse['city'] : 'city';
        $street =  (!empty($instanse['street']) )? $instanse['street'] : 'street';
        echo $args['before_title'] . esc_html($title)  . $args['after_title'];
        echo $args['before_widget'];
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-location-dot" style="padding:0px 5px;"></i>'.$address.'</li>';
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-phone-flip" style="padding:0px 5px;"></i>'.$phone.'</li>' ;
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-brands fa-whatsapp" style="padding:0px 5px;"></i>'.$phone2.'</li>' ;
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-envelope-open " style="padding:0px 5px;"></i>'.$email.'</li>' ;
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-location-dot" style="padding:0px 5px;"></i>'.$city.'</li>' ;
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-location-dot" style="padding:0px 5px;"></i>'.$street.'</li>' ;
        echo $args['after_widget'];
    }
}

add_action('widgets_init', function () {
    register_widget('maxart_custom_widget');
});
