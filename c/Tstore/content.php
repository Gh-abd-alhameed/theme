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
    <?php the_excerpt() ?>
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