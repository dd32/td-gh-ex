</div>
<div id="footer" style="background: url(<?php header_image();?>) center top;">
<?php
wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'footer', 'depth' => '1') );
?>
</div>
</div>
</div>
<?php
wp_footer();
?>
</body>
</html>