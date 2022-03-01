<?php get_header(); ?>

<?php if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <div class="container w-100 h-100 bg-primary">
            <?php the_title(); ?>
            <div class="row">
                <div class="col-lg-12">

                    <?php the_content(); ?>
                    
                </div>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>


<?php get_footer(); ?>