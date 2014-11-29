<?php
/**
 * Secondary Sidebar
 *
 * @package Catchbase
 * @subpackage Catchbase Pro
 * @since Catchbase 1.0
 */
?>
<?php 
/** 
 * catchbase_before_header_right hook
 */
do_action( 'catchbase_before_header_right' ); ?>

<aside class="sidebar sidebar-header-right widget-area">
	<?php
	if ( has_nav_menu( 'header-right' ) ) { 
	?>
    	<nav class="nav-header-right" role="navigation">
            <div class="wrapper">
                <h1 class="menu-toggle"><?php _e( 'Hedaer Right Menu', 'catchbase' ); ?></h1>
                <div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'catchbase' ); ?>"><?php _e( 'Skip to content', 'catchbase' ); ?></a></div>
                <?php             
                    $catchbase_header_right_menu_args = array(
                        'theme_location'    => 'header-right',
                        'menu_class' => 'menu catchbase-nav-menu'
                    );
                    wp_nav_menu( $catchbase_header_right_menu_args );
                ?>
        	</div><!-- .wrapper -->
        </nav><!-- .nav-secondary -->
	<?php
	}
	
	//Header Right Widgets Sidebar
	if ( is_active_sidebar( 'header-right' ) ) {
	   	dynamic_sidebar( 'header-right' ); 
	}	
	elseif ( !has_nav_menu( 'header-right' ) ) { ?> 
		<section id="widget-default-search" class="widget widget_text">
			<div class="widget-wrap">
				<aside id="search" class="widget widget_search">
					<?php get_search_form(); ?>
				</aside>
			</div><!-- .widget-wrap -->
		</section><!-- #widget-default-search -->
		<?php
        }
	?>
</aside><!-- .sidebar .header-sidebar .widget-area -->

<?php 
/** 
 * catchbase_after_header_right hook
 */
do_action( 'catchbase_after_header_right' ); ?>
