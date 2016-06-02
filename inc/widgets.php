<?php

//Load the widgets


require(get_template_directory() . '/inc/widgets/front-posts.php');
require(get_template_directory() . '/inc/widgets/advance_welcome.php');


add_action('admin_enqueue_scripts', 'advance_widget_scripts');

function advance_widget_scripts() {    

	 wp_enqueue_style( 'wp-color-picker' );      
     wp_enqueue_script( 'wp-color-picker' );
	if( function_exists( 'wp_enqueue_media' ) ) {

	wp_enqueue_media();
	}
    wp_enqueue_script('advance_widget_scripts', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
	
}


/*****************************************/
/******          WIDGETS     *************/
/*****************************************/

add_action('widgets_init', 'advancetheme_register_widgets');

function advancetheme_register_widgets() {    

		register_widget('advance_serviceblock');
		register_widget('advance_welcome_widgets');
	
	$advance_sidebars = array ( 'sidebar-frontpage' => 'sidebar-frontpage');
	
	/* Register sidebars */
	foreach ( $advance_sidebars as $advance_sidebar ):
	
		
			
			if( $advance_sidebar == 'sidebar-frontpage' ):
		
			$advance_name = __('Frontpage widget area', 'advance');
			
            endif;
		endforeach;
	
	class SFEditorWidget {


	/**
	 * Action: init
	 */
	public function __construct() {

		
		add_action( 'widgets_admin_page', array( $this, 'output_advance_editor_widget_html' ), 100 );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'output_advance_editor_widget_html' ), 1 );
		add_action( 'customize_controls_print_footer_scripts', array( $this, 'customize_controls_advance_footer_scripts' ), 2 );
		} // END __construct()

	public function output_advance_editor_widget_html() {
		
		?>
		<div id="wp-editor-widget-container" style="display: none;">
			<a class="close" href="javascript:WPEditorWidget.hideEditor();" title="<?php esc_attr_e( 'Close', 'advance' ); ?>"><span class="icon"></span></a>
			<div class="editor">
				<?php
				$settings = array(
					'textarea_rows' => 20,
				);
				wp_editor( '', 'sfeditorwidget', $settings );
				?>
				<p>
					<a href="javascript:WPEditorWidget.updateWidgetAndCloseEditor(true);" class="button button-primary"><?php _e( 'Save and close', 'advance' ); ?></a>
				</p>
			</div>
		</div>
		<div id="wp-editor-widget-backdrop" style="display: none;"></div>
		<?php
		
	} // END output_wp_editor_widget_html
	
	/**
	 * Action: customize_controls_print_footer_scripts
	 */
	public function customize_controls_advance_footer_scripts() {
	
		// Because of https://core.trac.wordpress.org/ticket/27853
		// Which was fixed in 3.9.1 so we only need this on earlier versions
		$wp_version = get_bloginfo( 'version' );
		if ( version_compare( $wp_version, '3.9.1', '<' ) && class_exists( '_WP_Editors' ) ) {
			_WP_Editors::enqueue_scripts();
		}
		
	} // END customize_controls_print_footer_scripts

	

} // END class WPEditorWidget

global $advance_editor_widget;
$advance_editor_widget = new SFEditorWidget;

	
}
