<footer class="">
    <div class="container my-5 ">

        <div class="row d-flex justify-content-center">
            <?php get_sidebar('About') ?>
            <?php get_sidebar('Our Services') ?>
            <?php get_sidebar('Get In Touch') ?>
            <?php get_sidebar('Location') ?>
            <div class="d-flex justify-content-between py-4 my-4 border-top">
                <?php $site_name = get_option('maxart_register_namesite'); ?>
                <p class="load">&copy; <?php echo date('Y') ?> <a class="" style="text-decoration: none;color: #8016a5 ;font-weight: bold;" href="<?php echo esc_url(get_bloginfo('url')); ?>"><?php echo $site_name; ?> </a>, All rights reserved.</p>
                <ul class="list-unstyled d-flex">
                    <li class="ms-3"><a href="https://facebook.com/<?php echo esc_attr($facebook); ?>"><i class="fa-brands fa-facebook-square link-dark" style="width: 25px; height:25px;"></i></a></li>
                    <li class="ms-3"> <a href="https://twitter.com/<?php echo esc_attr($twitter); ?>"><i class="fa-brands fa-twitter-square link-dark" style="width: 25px; height:25px;"></i></i></a>
                    </li>
                    <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                <use xlink:href="#facebook" />
                            </svg></a></li>
                </ul>
            </div>

        </div>
</footer>
<?php wp_footer();   ?>

</body>

</html>