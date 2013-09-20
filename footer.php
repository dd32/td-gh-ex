 <!-- Footer  --> 
 <?php $current_options=get_option('spa_theme_options'); 
 

  if(is_home()){ } 
  
  else{?>
 <!-----Footer Spacer Div----->
<div class="footer-blank">
</div>
<?php }?>






<!------End of Footer Spacer Div---->
<!-- Footer -->
<div class="row-fluid footer_full">
	<div class="container">
	<div class="row-fluid show-grid">
	<footer>
        <div class="span7">
		<p>&copy; <?php echo $current_options['footer_tagline'] ; ?> <a href="<?php echo home_url() ?>" target="_blank" title="<?php bloginfo('name'); ?>" ><?php bloginfo('name'); ?></a> | <?php _e('Spasalon  Theme by','sis_spa');?> <a href="http://www.webriti.com"><?php _e('webriti.com','sis_spa');?></a></p>
		</div>
				<div class="span5">
					<ul class="footer_nav_links pull-right">
					 
					  <?php  if ( has_nav_menu( 'footer-menu' ) ) :
                             	 wp_nav_menu( array(  'menu'       => 'footer-menu',
	   'theme_location' => 'footer-menu',
       'depth'      => -1,
       'container'  => false,
       'menu_class' => '',
	   'menu_id'=>'FooterMenu',
	    
       'fallback_cb' => 'wp_page_menu',
        //Process nav menu using our custom nav walker
        'walker' => new spasalon_nav_walker())
		);
	endif;?>				
					</ul>
				</div>
    </footer>
	</div> 
	</div>  
</div>
<!-- Close of Footer -->
<?php wp_footer();?>
</body>
</html>
 
 
 
 
 