<?php settings_errors();


$logo_site = get_option('maxart_register_logo');
$logo_image =  esc_url(content_url('uploads/') . $logo_site); ?>

<div class="rwo">
    <div class="col-6">
        <div class="img-thumbnail" style="background-image:url('<?php esc_url( $logo_image) ?>');background-repeat: no-repeat;height:80px;"></div>
    </div>
    <div class="col-6">
        <a data-image=".<?php esc_attr($logo_site) ?>." class="btn btn-danger" data-url=".<?php esc_url(admin_url('admin-ajax.php') . '?action=maxart_remove_logo') ?>." id="remove_logo_site">Delete</a>
    </div>
    <p id="show_msg">Delete</p>
</div>

<form action="options.php" method="post" enctype="multipart/form-data" novalidate="novalidate">
    <?php do_settings_sections('maxart_settings');    ?>

    <?php settings_fields('maxart-settings-option');  ?>

    <?php submit_button(); ?>

</form>