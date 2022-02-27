<?php
    settings_errors();
?>



<form id="form-css" action="options.php" method="post" novalidate="novalidate">

    <?php do_settings_sections('maxart_submenu_custom_css');    ?>
    <?php settings_fields('maxart-register-custom-css-option');  ?>
    <?php submit_button(); ?>

</form>