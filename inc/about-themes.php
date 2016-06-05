<?php
/**
 * beautiplus About Theme
 *
 * @package Beautiplus
 */

//about theme info
add_action( 'admin_menu', 'beautiplus_abouttheme' );
function beautiplus_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'beautiplus'), __('About Theme Info', 'beautiplus'), 'edit_theme_options', 'beautiplus_guide', 'beautiplus_mostrar_guide');   
} 

//guidline for about theme
function beautiplus_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<style type="text/css">
@media screen and (min-width: 800px) {
.wrap-GT{ display:table;}
.gt-left {float:left; width: 55%; padding: 2%; margin:10px 0 0 15px; background-color:#fff;}
.heading-gt{font-size:18px; color:#0073AA; font-weight:bold; padding-bottom:10px; border-bottom:1px solid #ccc;}
.gt-right {float:right; width: 32%; padding:2%; margin:10px 0 0 15px; background-color:#fff;}
.clear{ clear:both;}
.wrap-GT ul{ margin:0; padding:0;}
.wrap-GT ul li{ list-style: disc inside none;}
.wrap-GT ul li:hover{ color:#0073AA; cursor:pointer;}
}
</style>

<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <?php esc_attr_e('About Theme Info', 'beautiplus'); ?>
		   </div>
          <p><?php esc_attr_e('beautiplus is a free modern WordPress theme. it is easy to customize and loaded with the most powerfull features. It is perfect for photography, wedding, fitness, health , gym, yoga, personal, bloging any small business. also Compatible with WooCommerce, Nextgen gallery ,Contact Form 7 and many WordPress popular plugins. ','beautiplus'); ?></p>
<div class="heading-gt"> <?php esc_attr_e('Theme Features', 'beautiplus'); ?></div>
 

<div class="col-2">
  <h4><?php esc_attr_e('Theme Customizer', 'beautiplus'); ?></h4>
  <div class="description"><?php esc_attr_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'beautiplus'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_attr_e('Responsive Ready', 'beautiplus'); ?></h4>
  <div class="description"><?php esc_attr_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'beautiplus'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_attr_e('Cross Browser Compatible', 'beautiplus'); ?></h4>
<div class="description"><?php esc_attr_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'beautiplus'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_attr_e('E-commerce', 'beautiplus'); ?></h4>
<div class="description"><?php esc_attr_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'beautiplus'); ?></div>
</div>

</div><!-- .gt-left -->
	
	<div class="gt-right">			
			<div style="font-weight:bold;">				
				<a href="<?php echo Grace_LIVE_DEMO; ?>" target="_blank"><?php esc_attr_e('Live Demo', 'beautiplus'); ?></a> | 
				<a href="<?php echo Grace_PRO_THEME_URL; ?>"><?php esc_attr_e('Purchase Pro', 'beautiplus'); ?></a> | 
				<a href="<?php echo Grace_THEME_DOC; ?>" target="_blank"><?php esc_attr_e('Documentation', 'beautiplus'); ?></a>
                <div style="height:5px"></div>
				<hr />  
                <ul>
                 <li><?php esc_attr_e('Theme Customizer', 'beautiplus'); ?></li>
                 <li><?php esc_attr_e('Responsive Ready', 'beautiplus'); ?></li>
                 <li><?php esc_attr_e('Cross Browser Compatible', 'beautiplus'); ?></li>
                 <li><?php esc_attr_e('E-commerce', 'beautiplus'); ?></li>
                 <li><?php esc_attr_e('Contact Form 7 Plugin Compatible', 'beautiplus'); ?></li>  
                 <li><?php esc_attr_e('User Friendly', 'beautiplus'); ?></li> 
                 <li><?php esc_attr_e('Translation Ready', 'beautiplus'); ?></li>
                 <li><?php esc_attr_e('Many Other Plugins  Compatible', 'beautiplus'); ?></li>   
                </ul>              
               
			</div>		
	</div><!-- .gt-right-->
    <div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>