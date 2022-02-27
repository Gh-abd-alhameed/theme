<?php settings_errors();





?>

<div class="msg" id="msg-delete">
    <p>The image has been deleted successfully</p>
</div>
<div class="msg-error" id="msg-error">
    <p>TSomething went wrong</p>
</div>

<form action="options.php" method="post" enctype="multipart/form-data" novalidate="novalidate">
    <?php do_settings_sections('maxart_settings');    ?>

    <?php settings_fields('maxart-settings-option');  ?>

    <?php submit_button(); ?>

</form>