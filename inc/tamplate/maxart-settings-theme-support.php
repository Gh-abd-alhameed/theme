 <?php
    // General Theme Support
    
    settings_errors(); 
?>


 <form action="options.php" method="post" novalidate="novalidate">
     <?php do_settings_sections('maxart_settings_theme_support');    ?>
 </form>