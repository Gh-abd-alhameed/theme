<?php

/*
    @package Maxart
*/

get_header();
?>


<div class="container my-5">

    <?php if (have_posts()) :  ?>
        <?php woocommerce_content(); ?>
    <?php endif; ?>
</div>


<?php get_footer(); ?>