 <?php 
$footer_information = get_theme_mod('copyright', false);
if($footer_information):
?>
	<p id="copyright" class="pull-left"><?php echo htmlspecialchars_decode(esc_html($footer_information)); ?></p>
<?php
endif;