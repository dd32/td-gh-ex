<?php
/**
 * The Sidebar containing the primary widget area
 *
 * @package Catch Themes
 * @subpackage Full Frame
 * @since Full Frame 1.0 
 */
?>

<?php
/** 
 * fullframe_before_secondary hook
 */
do_action( 'fullframe_before_secondary' );?>
	
<?php
	global $post, $wp_query;

	$options = fullframe_get_theme_options();
	
	$themeoption_layout = $options['theme_layout'];
	
	// Front page displays in Reading Settings
	$page_on_front = get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts'); 

	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();	
	
	// Post /Page /General Layout
	if ( $post) {
		if ( is_attachment() ) { 
			$parent = $post->post_parent;
			$layout = get_post_meta( $parent, 'fullframe-layout-option', true );
			$sidebaroptions = get_post_meta( $parent, 'fullframe-sidebar-options', true );
			
		} else {
			$layout = get_post_meta( $post->ID, 'fullframe-layout-option', true ); 
			$sidebaroptions = get_post_meta( $post->ID, 'fullframe-sidebar-options', true ); 
		}
	}
	else {
		$sidebaroptions = '';
	}
			
	if( empty( $layout ) || ( !is_page() && !is_single() ) ) {
		$layout = 'default';
	}
	
	if( 'no-sidebar' == $layout || 'no-sidebar-one-column' == $layout || 'no-sidebar-full-width' == $layout ) {
		return;
	}

	if( 'default' == $layout && ( 'no-sidebar' == $themeoption_layout || 'no-sidebar-one-column' == $themeoption_layout || 'no-sidebar-full-width' == $themeoption_layout ) ) {
		return;
	}

	do_action( 'fullframe_before_primary_sidebar' ); 
	?>   
		
		<aside class="sidebar sidebar-primary widget-area" role="complementary">
		<?php
		//Primary Sidebar
		if ( is_active_sidebar( 'primary-sidebar' ) ) {
        	dynamic_sidebar( 'primary-sidebar' ); 
   		}	
		else { ?>
			<section id="widget-default-text" class="widget widget_text">	
				<div class="widget-wrap">
                	<h4 class="widget-title"><?php _e( 'Primary Sidebar Widget Area', 'fullframe' ); ?></h4>
           		
           			<div class="textwidget">
                   		<p><?php _e( 'This is the Primary Sidebar Widget Area if you are using a two or three column site layout option.', 'fullframe' ); ?></p>
                   		<p><?php printf( __( 'You can add content to this area by visiting your <a href="%s">Widgets Panel</a> and adding new widgets to this area.', 'fullframe' ), admin_url( 'widgets.php' ) ); ?></p>
                 	</div>
           		</div><!-- .widget-wrap -->
       		</section><!-- #widget-default-text -->
		<?php
		} ?>
		</aside><!-- .sidebar sidebar-primary widget-area -->
		
	<?php 
	/** 
	 * fullframe_after_primary_sidebar hook
	 */
	do_action( 'fullframe_after_primary_sidebar' ); ?>    

<?php
/** 
 * fullframe_after_secondary hook
 *
 */
do_action( 'fullframe_after_secondary' );
