<?php
/* 
    @package Maxart
*/
get_header(); ?>

<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <div class="container">
            <?php the_title(); ?>
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>