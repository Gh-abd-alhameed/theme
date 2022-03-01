<?php get_header(); ?>

<?php  
// var_dump() ;
 ?>
<?php if ( is_user_member_of_blog( )) {  ?>
<?php
    //  if ( check_import_new_users(get_role('Customer'))) {echo "Customer" ;}else{ "not Customer"  ; }
       ?>

<section class="body-post">
    <div class="container mx-auto pt-4">

        <?php
        if (have_posts()) : while (have_posts()) :  the_post(); ?>

                <div class="main-post card mb-3 ">
                    <?php edit_post_link(); ?>
                    <div class="card-body">
                        <h3 class="card-title"><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item post-auther " aria-current="page"><?php the_author_posts_link(); ?></li>
                                <li class="breadcrumb-item post-date " aria-current="page"><?php the_date(); ?> <?php the_time(); ?></li>
                                <li class="breadcrumb-item post-comments " aria-current="page"><?php comments_popup_link('0 comments', 'one comment'); ?></li>
                            </ol>
                        </nav>
                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'd-block card-img-top', 'style' => 'width:100%;height:150px;']); ?>
                        <div id="content-post" class="card-text">
                            <?php the_content(); ?>
                        </div>
                        <p class="load card-link">
                            <?php the_category(" , "); ?>
                        </p>
                        <p class="load ">

                            <?php
                            if (has_tag()) {
                                the_tags();
                            } else {
                                echo 'no tags';
                            }

                            ?>
                        </p>
                    </div>
                </div>
                <h3>
        
        

        </h3>

            <?php endwhile;  ?>

        <?php
        endif;
        
        
        echo '<div class="row pt-2">';
        echo  '<div class="col-12 text-center">';

        if (get_previous_post_link()) {
            previous_post_link('%link.',  '<button type="button" class="btn btn-dark mx-1 ">' . 'pre</button>',);
        } else {
            echo '<button type="button" class="btn btn-dark mx-1 "disabled>pre</button>';
        }
        if (get_next_post_link()) {

            next_post_link('%link.',  '<button type="button" class="btn btn-dark mx-1 ">' . 'next</button>',);
        } else {
            echo '<button type="button" class="btn btn-dark mx-1 "disabled>next</button>';
        }
        echo '</div>';
        echo '</div>';
        comments_template()
        ?>


    </div>

</section>
<?php }else {
    
}?>

<?php get_footer(); ?>