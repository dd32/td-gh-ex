<?php
/**
 * Chip Life HEADER BEFORE Hooks
 */

/** Primary Menu */
add_action( 'chip_life_header_before', 'chip_life_primary_menu_init' );

/**
 * Chip Life HEADER Hooks
 */
 
/** Header Left Column */
add_action( 'chip_life_header_left', 'chip_life_header_left_sidebar_init' );
function chip_life_header_left_sidebar_init() {
?>	
	<?php if( is_active_sidebar('header-left-sidebar') ): ?>
    <div id="header-left-sidebar">
      <div id="header-left-sidebar-data">    
	    <?php dynamic_sidebar( 'header-left-sidebar' ); ?>
      </div> <!-- end #header-left-sidebar-data -->
    </div> <!-- end #header-left-sidebar -->
    <?php endif; ?>
	
<?php
}

/** Header Right Column */
add_action( 'chip_life_header_right', 'chip_life_header_right_sidebar_init' );
function chip_life_header_right_sidebar_init() {
?>	
	<?php if( is_active_sidebar('header-right-sidebar') ): ?>
    <div id="header-right-sidebar">
      <div id="header-right-sidebar-data">
        <?php dynamic_sidebar( 'header-right-sidebar' ); ?>
      </div> <!-- end #header-left-sidebar-data -->
    </div> <!-- end #header-left-sidebar -->
    <?php endif; ?>
	
<?php
}

/** Chip Life Header Sidebars */
add_action( 'chip_life_header', 'chip_life_sidebars_header_front_init' );
function chip_life_sidebars_header_front_init() {
	
	$chip_life_options = get_chip_life_options();
	if( $chip_life_options['chip_life_sidebars_header'] == 1 ):
	
?>
	
    <div id="header-sidebars">
      <div id="header-sidebars-data">
    
        <?php
		do_action( 'chip_life_header_left' );
		do_action( 'chip_life_header_right' );
		?>

	  <div class="clear"></div>
      </div> <!-- end #headimg-data -->	
    </div>  <!-- end #header-sidebars -->	

<?php	
	endif;
}

/** Chip Life Header */
add_action('chip_life_header', 'chip_life_custom_header_front_init');
function chip_life_custom_header_front_init() {
	
	$chip_life_options = get_chip_life_options();
	if( $chip_life_options['chip_life_custom_header'] == 1 ):
		
?>
    <div id="headimg">
      <div id="headimg-data">        
        
        <?php 
		$header_textcolor = get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR );
		if( ( !empty( $header_textcolor ) && $header_textcolor != 'blank' ) ):
		?>
        <h1><a id="name" href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
        <div id="desc"><?php bloginfo( 'description' ); ?></div>
        <?php else: ?>
        <a href="<?php echo home_url( '/' ); ?>"><img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>        
        <?php endif; ?>
      
      </div> <!-- end #headimg-data -->	
    </div> <!-- end #headimg -->

<?php 
endif;
}

/**
 * Chip Life HEADER AFTER Hooks
 */

/** Secondary Menu Init */
add_action( 'chip_life_header_after', 'chip_life_secondary_menu_init' );

/** Sponsor Sidebar 1 */
add_action( 'chip_life_header_after', 'chip_life_sponsor_sidebar1_init' );
?>