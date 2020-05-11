<?php
$header_color_setting = get_theme_mod( 'header_color_setting' );
$footer_color_setting = get_theme_mod( 'footer_color_setting' );
?>


<style>
header {
    background: <?php echo $header_color_setting; ?> !important;
}
.footer {
    background: <?php echo $footer_color_setting; ?> !important;
}
</style>