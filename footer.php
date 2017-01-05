<?php
/**
 * Footer For Deserve Theme.
 */
$deserve_options = get_option( 'deserve_theme_options' ); ?>
<footer class="main_footer footer-menu">
  <div class="top_footer">
    <div class="container deserve-container">
		<?php if ( is_active_sidebar( 'footer-1' )  || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' )  || is_active_sidebar( 'footer-4' ) )
         { ?>
      <div class="row deserve-widget">
			<?php if ( is_active_sidebar( 'footer-1' ) ) { ?><aside class="col-md-3 col-sm-6">  <?php dynamic_sidebar( 'footer-1' ); 	?> </aside><?php } 
      if ( is_active_sidebar( 'footer-2' ) ) { ?> <aside class="col-md-3 col-sm-6"> <?php dynamic_sidebar( 'footer-2' );	?> </aside><?php } 
      if ( is_active_sidebar( 'footer-3' ) ) { ?><aside class="col-md-3 col-sm-6">  <?php dynamic_sidebar( 'footer-3' ); 	?> </aside><?php } 
      if ( is_active_sidebar( 'footer-4' ) ) { ?><aside class="col-md-3 col-sm-6">  <?php dynamic_sidebar( 'footer-4' ); 	?> </aside><?php } ?>
      </div>
      <?php } ?>      
      <div class="bottom-footer">
	<?php if(!empty($deserve_options['footertext'])) { ?>
        <p><?php 	echo esc_html($deserve_options['footertext']).' ';  ?></p>
        <?php } ?>        
        <span class='deserve-poweredby'>
		<?php printf( __( 'Powered by %1$s.', 'deserve' ), '<a href="http://fruitthemes.com/wordpress-themes/deserve" target="_blank">Deserve WordPress Theme</a>' ); ?>
		</span>
        <div class="terms">
             <?php wp_nav_menu(array('theme_location'  => 'secondary', 'fallback_cb' => false)); ?>
        </div>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>