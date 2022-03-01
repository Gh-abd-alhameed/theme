<?php 
require_once(get_template_directory() . '/inc/walker_comments.php');
if(comments_open()){
    echo '<div class="container">' ;
        echo ' <div class="row">';
            echo '<ul class="comments">';
                $com_array =array(
                    'walker'=> new walker_comment_custom_style(),
                    'max_depth' =>3,
                    'type' => 'comment',
                    'style' => "ul",
                ) ;
                wp_list_comments($com_array);
            echo '</ul>' ; 
        echo '</div>';
    echo '</div>';
    comment_form();
}else{
    echo 'close comments';
}


?>