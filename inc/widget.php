<?php



class maxart_info_contact_widget extends WP_Widget
{

    public function __construct()
    {
        $widget_info = array(
            'classname' => 'maxart',
            'discription' => 'this is demo'
        );
        parent::__construct('Get-In-Touch', 'Get In Touch', $widget_info);
    }
    //output Back-end function
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])  ? strip_tags($new_instance['title']) : '');
        $instance['address'] = (!empty($new_instance['address'])  ? strip_tags($new_instance['address']) : '');
        $instance['phone'] = (!empty($new_instance['phone'])  ? strip_tags($new_instance['phone'])  : 0);
        $instance['phone2'] = (!empty($new_instance['phone2'])  ? strip_tags($new_instance['phone2']) : 0);
        $instance['email'] = (!empty($new_instance['email'])  ? strip_tags($new_instance['email']) : '');
        $instance['city'] = (!empty($new_instance['city']) ? strip_tags($new_instance['city']) : '');
        $instance['street'] = (!empty($new_instance['street'])  ? strip_tags($new_instance['street']) : '');
        return $instance;
    }
    // Front-end display of widget
    public function widget($args, $instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $address =  (!empty($instance['address'])) ? $instance['address'] : '';
        $phone =  (!empty($instance['phone'])) ? strip_tags($instance['phone']) : get_option('maxart_register_phone_number');
        $phone2 =  (!empty($instance['phone2'])) ? strip_tags($instance['phone2']) : 0;
        $email =  (!empty($instance['email'])) ? $instance['email'] : get_bloginfo('admin_email');
        $city =  (!empty($instance['city'])) ? $instance['city'] : '';
        $street =  (!empty($instance['street'])) ? $instance['street'] : '';
        echo $args['before_title'] . esc_html($title)  . $args['after_title'];
        echo $args['before_widget'];
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-location-dot" style="padding:0px 5px;"></i>' . $address  . '</li>';
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-phone-flip" style="padding:0px 5px;"></i>' .esc_html($phone)  . '</li>';
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-brands fa-whatsapp" style="padding:0px 5px;"></i>' . esc_html($phone2) . '</li>';
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-envelope-open " style="padding:0px 5px;"></i>' . esc_html($email) . '</li>';
        if(!empty($city)):
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-location-dot" style="padding:0px 5px;"></i>' . esc_html($city) . '</li>';
        endif;
        if(!empty($street)):
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-location-dot" style="padding:0px 5px;"></i>' . esc_html($street) . '</li>';
        endif;
        echo $args['after_widget'];
    }
    // Back-end display of widget
    public function Form($instance)
    {
        $title = (!empty($instance['title'])) ? $instance['title'] : 'Get In Touch';
        $address =  (!empty($instance['address'])) ? $instance['address'] : 'address';
        $phone =  (!empty($instance['phone'])) ? $instance['phone'] : get_option('maxart_register_phone_number');
        $phone2 =  (!empty($instance['phone2'])) ? $instance['phone2'] : 'Phone 2 ';
        $email =  (!empty($instance['email'])) ? $instance['email'] : get_bloginfo('admin_email');
        $city =  (!empty($instance['city'])) ? $instance['city'] : 'city';
        $street =  (!empty($instance['street'])) ? $instance['street'] : 'street';
?>
        <div>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title</label>
            <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="' .<?php echo esc_attr($this->get_field_id('address')); ?>" value="<?php echo esc_attr($title) ?>">

            <label for="<?php echo  esc_attr($this->get_field_id('address')); ?>">Address</label>
            <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('address')); ?>" id="<?php echo esc_attr($this->get_field_id('address')); ?>" value="<?php echo esc_attr($address) ?>">

            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>">Phone</label>
            <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" value="<?php echo esc_attr($phone) ?>">

            <label for="<?php echo esc_attr($this->get_field_id('phone2')); ?>">whatsapp</label>
            <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('phone2')); ?>" id="<?php echo esc_attr($this->get_field_id('phone2')); ?>" value="<?php echo esc_attr($phone2) ?>">

            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>">Email</label>
            <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('email')); ?>" id="<?php echo esc_attr($this->get_field_id('email')); ?>" value="<?php echo esc_attr($email) ?>">

            <label for="<?php echo esc_attr($this->get_field_id('city')); ?>">City</label>
            <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('city')); ?>" id="<?php echo esc_attr($this->get_field_id('city')); ?>" value="<?php echo esc_attr($city) ?>">

            <label for="<?php echo esc_attr($this->get_field_id('street')); ?>">Street</label>
            <input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('street')); ?>" id="<?php echo esc_attr($this->get_field_id('street')); ?>" value="<?php echo esc_attr($street) ?>">
            

        </div>

<?php
    }
}

add_action('widgets_init', function () {
    register_widget('maxart_info_contact_widget');
});

?>