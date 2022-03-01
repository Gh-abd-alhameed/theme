<?php get_header(); ?>



<section class="body-post">
    <div class="container mx-auto pt-4">
        <div class="row m-0 p-0">
            <?php
            if (have_posts()) : while (have_posts()) :  the_post(); echo 'ehis is formate post is : ' . get_post_format() ; ?>
                    <div class="col-xs-12 col-md-6 col-lg-4 p-0 my-0 mx-auto">
                        <div class="main-post card mb-3 ">
                            <div class="card-body">
                                <?php 
                                get_template_part('content' , get_post_format()) 
                                ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;  ?>
            <?php
            endif;
            echo '<div class="row pt-2">';
                echo  '<div class="col-12 text-center">';
                    if (get_previous_posts_link()) {
                        previous_posts_link('<button type="button" class="btn btn-dark mx-1 ">pre</button>');
                    } else {
                        echo '<button type="button" class="btn btn-dark mx-1 "disabled>pre</button>';
                    }
                    if (get_next_posts_link()) {
                        next_posts_link('<button type="button" class="btn btn-dark mx-1 ">next</button>');
                    } else {
                        echo '<button type="button" class="btn btn-dark mx-1 "disabled>next</button>';
                    }
                echo '</div>';
            echo '</div>';

            ?>

        </div>
    </div>

</section>
<?php get_footer(); ?>