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
        $title = (!empty($instance['title'])) ? $instance['title'] : 'Get In Touch';
        $address =  (!empty($instanse['address'])) ? $instanse['address'] : 'address';
        $phone =  (!empty($instanse['phone'])) ? $instanse['phone'] : get_option('maxart_register_phone_number');
        $phone2 =  (!empty($instanse['phone2'])) ? $instanse['phone2'] : 'Phone 2 ';
        $email =  (!empty($instanse['email'])) ? $instanse['email'] : get_bloginfo('admin_email');
        $city =  (!empty($instanse['city'])) ? $instanse['city'] : 'city';
        $street =  (!empty($instanse['street'])) ? $instanse['street'] : 'street';
?>
        <form method="post">
            <label for="<?php echo $this->get_field_id('title'); ?>">Address</label>
            <input type="text" class="components-placeholder__input" name="<?php echo $this->get_field_name('title'); ?>" id="' .<?php echo $this->get_field_id('address'); ?>" value="<?php echo $title ?>">

            <label for="<?php echo  $this->get_field_id('address'); ?>">Address</label>
            <input type="text" class="components-placeholder__input" name="<?php echo $this->get_field_name('address'); ?>" id="' .<?php echo $this->get_field_id('address'); ?>" value="<?php echo $address ?>">

            <label for="<?php echo $this->get_field_id('phone'); ?>">Address</label>
            <input type="text" class="components-placeholder__input" name="<?php echo $this->get_field_name('phone'); ?>" id="' .<?php echo $this->get_field_id('phone'); ?>" value="<?php echo $phone ?>">

            <label for="<?php echo $this->get_field_id('phone2'); ?>">Address</label>
            <input type="text" class="components-placeholder__input" name="<?php echo $this->get_field_name('phone2'); ?>" id="' .<?php echo $this->get_field_id('phone2'); ?>" value="<?php echo $phone2 ?>">

            <label for="<?php echo $this->get_field_id('email'); ?>">Address</label>
            <input type="text" class="components-placeholder__input" name="<?php echo $this->get_field_name('email'); ?>" id="' .<?php echo $this->get_field_id('email'); ?>" value="<?php echo $email ?>">

            <label for="<?php echo $this->get_field_id('city'); ?>">Address</label>
            <input type="text" class="components-placeholder__input" name="<?php echo $this->get_field_name('city'); ?>" id="' .<?php echo $this->get_field_id('city'); ?>" value="<?php echo $city ?>">

            <label for="<?php echo $this->get_field_id('street'); ?>">Address</label>
            <input type="text" class="components-placeholder__input" name="<?php echo $this->get_field_name('street'); ?>" id="' .<?php echo $this->get_field_id('street'); ?>" value="<?php echo $street ?>">


        </form>
        <button type="button" class="components-button  is-primary">send</button>
<?php
    }
    //output Back-end function
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])  ? strip_tags($new_instance['title']) : '');
        $instance['address'] = (!empty($new_instance['address'])  ? strip_tags($new_instance['address']) : '');
        $instance['phone'] = (!empty($new_instance['phone'])  ? strip_tags($new_instance['phone']) : get_option('maxart_register_phone_number'));
        $instance['phone2'] = (!empty($new_instance['phone2'])  ? strip_tags($new_instance['phone2']) : '');
        $instance['email'] = (!empty($new_instance['email'])  ? strip_tags($new_instance['email']) : get_bloginfo('admin_email'));
        $instance['city'] = (!empty($new_instance['city']) ? strip_tags($new_instance['city']) : '');
        $instance['street'] = (!empty($new_instance['street'])  ? strip_tags($new_instance['street']) : '');
        return $instance;
    }
    // Front-end display of widget
    public function widget($args, $instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $address =  (!empty($instanse['address'])) ? $instanse['address'] : 'address';
        $phone =  (!empty($instanse['phone'])) ? $instanse['phone'] : get_option('maxart_register_phone_number');
        $phone2 =  (!empty($instanse['phone2'])) ? $instanse['phone2'] : 'Phone 2 ';
        $email =  (!empty($instanse['email'])) ? $instanse['email'] : get_bloginfo('admin_email');
        $city =  (!empty($instanse['city'])) ? $instanse['city'] : 'city';
        $street =  (!empty($instanse['street'])) ? $instanse['street'] : 'street';
        echo $args['before_title'] . esc_html($title)  . $args['after_title'];
        echo $args['before_widget'];
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-location-dot" style="padding:0px 5px;"></i>' . $address . '</li>';
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-phone-flip" style="padding:0px 5px;"></i>' . $phone . '</li>';
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-brands fa-whatsapp" style="padding:0px 5px;"></i>' . $phone2 . '</li>';
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-envelope-open " style="padding:0px 5px;"></i>' . $email . '</li>';
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-location-dot" style="padding:0px 5px;"></i>' . $city . '</li>';
        echo '<li class="nav-item mb-2 nav-link p-0 text-muted"><i class="fa-solid fa-location-dot" style="padding:0px 5px;"></i>' . $street . '</li>';
        echo $args['after_widget'];
    }
}

add_action('widgets_init', function () {
    register_widget('maxart_custom_widget');
});
?>