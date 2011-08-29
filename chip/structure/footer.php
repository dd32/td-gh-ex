<?php
/**
 * Chip Life FOOTER Hooks
 */
 
/** Chip Life Footer Sidebars: Left Middle Right */
add_action( 'chip_life_footer', 'chip_life_footer_lmr_sidebars_init' );
function chip_life_footer_lmr_sidebars_init() {
	
	if( is_active_sidebar('footer-left-sidebar') || is_active_sidebar('footer-middle-sidebar') || is_active_sidebar('footer-right-sidebar') ):
	?>
	
    <div id="footer-lmr-sidebars">
      <div id="footer-lmr-sidebars-data">
	
	    <?php do_action( 'chip_life_footer_lmr_before' ); ?>
		
		<?php if( is_active_sidebar('footer-left-sidebar') ): ?>
        <div id="footer-left-sidebar">
          <div id="footer-left-sidebar-data">    
	        <?php dynamic_sidebar( 'footer-left-sidebar' ); ?>
          </div> <!-- end #footer-left-sidebar-data -->
        </div> <!-- end #footer-left-sidebar -->
        <?php endif; ?>
        
        <?php if( is_active_sidebar('footer-middle-sidebar') ): ?>
        <div id="footer-middle-sidebar">
          <div id="footer-middle-sidebar-data">    
	        <?php dynamic_sidebar( 'footer-middle-sidebar' ); ?>
          </div> <!-- end #footer-left-sidebar-data -->
        </div> <!-- end #footer-left-sidebar -->
        <?php endif; ?>
        
        <?php if( is_active_sidebar('footer-right-sidebar') ): ?>
        <div id="footer-right-sidebar">
          <div id="footer-right-sidebar-data">    
	        <?php dynamic_sidebar( 'footer-right-sidebar' ); ?>
          </div> <!-- end #footer-left-sidebar-data -->
        </div> <!-- end #footer-left-sidebar -->
        <?php endif; ?>
    
      <div class="clear"></div>
      </div> <!-- end #footer-lmr-sidebars-data -->
    </div> <!-- end #footer-lmr-sidebars -->	

<?php    
	endif;
}

/** Chip Life Copyright */
add_action( 'chip_life_footer', 'chip_life_copyright_init' );
function chip_life_copyright_init() {
	
	$chip_life_options = get_chip_life_options();
	$copyright_data = htmlspecialchars_decode ( $chip_life_options['chip_life_copyright'] );
	
	if( ! empty( $copyright_data ) )	 {
	
		echo '<div id="chip-life-copyright">
		  <div id="chip-life-copyright-data">
			'. $copyright_data .'
		  </div>
		</div>
		';	
	}

}

/** Chip Life Information */
add_action( 'chip_life_footer', 'chip_life_info_init' );
function chip_life_info_init() {
	
	$parent_theme = get_template();
	$child_theme = get_current_theme();
	$child_theme_label = '';
	
	if( $child_theme !== 'Chip Life' ) {
		$child_theme_label = '<a href="'.CHIP_LIFE_CHILD_THEME_URL.'" title="'.get_current_theme().'">' . get_current_theme() . '</a> Theme On ';
	}
	
	echo '<div id="chip-life-credit">
	  <div id="chip-life-credit-data">
	     
		 <div class="return-to-top">
		   <div class="return-to-top-data">
		     <a href="#wrap">Return to Top</a>
		   </div>
		 </div>
		 
		 <div class="chip-life-info">
		   <div class="chip-life-info-data">
		     '.$child_theme_label.'Chip Life Framework by <a href="http://www.tutorialchip.com/" title="TutorialChip">TutorialChip</a> &middot; <a href="http://wordpress.org/" title="WordPress">WordPress</a>
		   </div>
		 </div>		 
		 
	  <div class="clear"></div>
	  </div>
	</div>
	';

}
?>