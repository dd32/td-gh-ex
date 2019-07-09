<?php
/**
 *Animate Lite About Theme
 *
 * @package Animate Lite
 */

//about theme info
add_action( 'admin_menu', 'animate_lite_abouttheme' );
function animate_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'animate-lite'), __('About Theme Info', 'animate-lite'), 'edit_theme_options', 'animate_lite_guide', 'animate_lite_mostrar_guide');   
} 

//Info of the theme
function animate_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'animate-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Animate Lite is a stylish and gracious, charming and visually stunning, elegant and refined, modern and responsive pet care WordPress theme. Its a flexible and very purposeful theme, dedicated to pets and animal lovers. It is specially developed to provide a very appealing space for animal care, pet care centers, pet stores and all other pet related business ventures. This multipurpose theme can also be used for pet adoption, dog training classes, pet sitters, online pet shops, pet hotels, veterinary clinics, safari and zoo sites, animal shelter charities, safari parks, wildlife charities and aquariums.', 'animate-lite'); ?></p>
          
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'animate-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'animate-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'animate-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'animate-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'animate-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'animate-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'animate-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'animate-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'animate-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">    
     <a href="<?php echo esc_url( animate_lite_live_demo ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'animate-lite'); ?></a> | 
    <a href="<?php echo esc_url( animate_lite_theme_doc ); ?>" target="_blank"><?php esc_html_e('Documentation', 'animate-lite'); ?></a>    
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>