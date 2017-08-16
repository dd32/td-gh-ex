<?php
//about theme info
add_action( 'admin_menu', 'adventure_lite_abouttheme' );
function adventure_lite_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'adventure-lite'), esc_html__('About Theme', 'adventure-lite'), 'edit_theme_options', 'adventure_lite_guide', 'adventure_lite_mostrar_guide');   
} 

//guidline for about theme
function adventure_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.col-left {float:left; width: 65%; padding: 1%;}
.col-right {float:right; width: 30%; padding:1%; border-left:1px solid #DDDDDD; }
}
</style>

<div class="wrapper-info">
	<div class="col-left">
   		   <div style="font-size:16px; font-weight:bold; padding-bottom:5px; border-bottom:1px solid #ccc;">
			  <?php esc_attr_e('About Theme Info', 'adventure-lite'); ?>
		   </div>
          <p><?php esc_attr_e('Description Goes Here','adventure-lite'); ?></p>
		  <a href="<?php echo SKTTHEMES_PRO_THEME_URL; ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	
	<div class="col-right">			
			<div style="text-align:center; font-weight:bold;">
				<hr />
				<a href="<?php echo SKTTHEMES_LIVE_DEMO; ?>" target="_blank"><?php esc_attr_e('Live Demo', 'adventure-lite'); ?></a> | 
				<a href="<?php echo SKTTHEMES_PRO_THEME_URL; ?>"><?php esc_attr_e('Buy Pro', 'adventure-lite'); ?></a> | 
				<a href="<?php echo SKTTHEMES_THEME_DOC; ?>" target="_blank"><?php esc_attr_e('Documentation', 'adventure-lite'); ?></a>
                <div style="height:5px"></div>
				<hr />                
                <a href="<?php echo SKTTHEMES_THEMES; ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>