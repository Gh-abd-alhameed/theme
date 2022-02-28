 <?php
   
    
    settings_errors(); 
?>


 <form action="options.php" method="post" novalidate="novalidate">
     <?php do_settings_sections('maxart_settings_theme_support');    ?>
     <?php settings_fields('maxart-theme-support-option') ;  ?>
     <?php submit_button()  ; ?>

 </form>