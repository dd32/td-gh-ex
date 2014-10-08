<?php 
/**
 * The Footer template.
 */
 $medics_options = get_option( 'medics_theme_options' ); 
 ?>

<footer>
  <div class="col-md-12 footer-menu no-padding">
    <div class="container container-medics ">
      <div class="col-md-3 footer-blogs clearfix no-padding-left">
        <?php if ( is_active_sidebar( 'footer-1' ) ) {  dynamic_sidebar( 'footer-1' ); } ?>
      </div>
      <div class="col-md-3 recent-bolg footer-blogs clearfix">
        <?php if ( is_active_sidebar( 'footer-2' ) ) {  dynamic_sidebar( 'footer-2' ); } ?>
      </div>
      <div class="col-md-3 footer-blogs clearfix">
        <?php if ( is_active_sidebar( 'footer-3' ) ) {  dynamic_sidebar( 'footer-3' ); } ?>
      </div>
      <div class="col-md-3 footer-blogs clearfix no-padding-right">
        <?php if ( is_active_sidebar( 'footer-4' ) ) {  dynamic_sidebar( 'footer-4' ); } ?>
      </div>
    </div>
  </div>
  <div class="copyright col-md-12 no-padding">
    <div class="container container-medics">
      <div class="col-md-8 no-padding">
        <?php if(!empty($medics_options['footertext'])) {
			 	echo '<p>'.esc_attr($medics_options['footertext']).' ' ; 
			  } 
			  echo'<span class="medics-poweredby">Powered by <a target="_blank" href="http://wordpress.org">WordPress</a> and <a href="http://fasterthemes.com/wordpress-themes/Medics" target="_blank">Medics</a>.</span> </p>';
		 ?>
      </div>
      <div class="col-md-4 text-right no-padding">
        <?php 
			$medics_footer = array(
					'theme_location'  => 'secondary',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => '',
					'menu_id'         => '',
					'echo'            => true,   
					'items_wrap'      => '<ul id="%1$s" class="%2$s list-inline">%3$s</ul>',
				   );   
				if ( has_nav_menu('secondary')) { wp_nav_menu( $medics_footer ); }	  
		?>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body></html>
