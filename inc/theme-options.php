<?php 
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Theme Options
 *
 * @package advantage
 * @since advantage 1.0
 */
add_action( 'admin_init', 'advantage_theme_options_init' );
add_action( 'admin_menu', 'advantage_theme_options_admin_menu' );
function advantage_admin_enqueue_scripts( $hook_suffix ) {
	global $advantage_options;
	$advantage_options = advantage_get_options();
	
	$template_uri = get_template_directory_uri();	
	wp_enqueue_style( 'wp-color-picker' );
	wp_enqueue_style( 'advantage-theme-options', $template_uri . '/css/theme-options.css', false, '1.0' );
	wp_enqueue_script( 'advantage-theme-options', $template_uri . '/js/theme-options.js', array('jquery','wp-color-picker'), '1.0' );
	
	global $advantage_fonts;
	$advantage_fonts = advantage_fonts_array();
	foreach ( $advantage_fonts as $font ) {
		if ( ! empty( $font['url'] ) )
			wp_enqueue_style( str_replace(' ', '', $font['label'] ), $font['url'], false, '1.0' );
	}
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'advantage_admin_enqueue_scripts' );

function advantage_theme_options_init() {
    register_setting( 'advantage_options', 'advantage_theme_options', 'advantage_theme_options_validate' );
}

function advantage_theme_options_admin_menu() {
    add_theme_page( __('Theme Options', 'advantage' ), __('Theme Options', 'advantage' ), 'edit_theme_options', 'theme_options', 'advantage_theme_options_display_page' );
}

function advantage_theme_options_array() {	
	global $advantage_fonts;
	
	$theme_options = array(
		'currenttab'	=> array(
			'name'	=> 'currenttab',
			'type'	=> 'hidden',			
		),	
// Layout
		'gridwidth'	=> array(
			'name'	=> 'gridwidth',
			'label'	=> __( 'Grid Width', 'advantage' ),
			'type'	=> 'number',
			'desc'	=> __( 'Pixels', 'advantage' ),
		),
		'content'	=> array(
			'name'	=> 'content',
			'label'	=> __( 'Content', 'advantage' ),
			'type'	=> 'number',
			'fieldonly'	=> '1',
		),
		'sidebar1'	=> array(
			'name'	=> 'sidebar1',
			'label'	=> __( 'Sidebar 1', 'advantage' ),
			'type'	=> 'number',
			'fieldonly'	=> '1',
		),
		'sidebar2'	=> array(
			'name'	=> 'sidebar2',
			'label'	=> __( 'Sidebar 2', 'advantage' ),
			'type'	=> 'number',
			'desc' => __( 'Columns', 'advantage' ),
			'fieldonly'	=> '1',
		),
		'sidebarpos'	=> array(
			'name'	=> 'sidebarpos',
			'label'	=> __( 'Sidebar Position', 'advantage' ),
			'type'	=> 'radio',		
			'values' => array(
					array( 'key' => 1, 'label' => __( 'Right ', 'advantage' ) ),
					array( 'key' => 2, 'label' => __( 'Left ', 'advantage' ) ),
					array( 'key' => 3, 'label' => __( 'Left & Right ', 'advantage' ) ),
						),
		),
		'sidebarresp'	=> array(
			'name'	=> 'sidebarresp',
			'label'	=> __( 'Responsive Sidebar', 'advantage' ),
			'type'	=> 'checkbox',
			'desc'  => __( 'Check to activate responsive sidebars when screen width below breakpoints', 'advantage' ),
		),
		'respbp'	=> array(
			'name'	=> 'respbp',
			'label'	=> __( 'Responsive Sidebar Breakpoint', 'advantage' ),
			'type'	=> 'number',
			'desc'  => __( 'minimum 960 pixels', 'advantage' ),
		),
		'column_footer1'	=> array(
			'name'	=> 'column_footer1',
			'type'	=> 'number',
			'fieldonly'	=> '1',
		),
		'column_footer2'	=> array(
			'name'	=> 'column_footer2',
			'type'	=> 'number',
			'fieldonly'	=> '1',
		),
		'column_footer3'	=> array(
			'name'	=> 'column_footer3',
			'type'	=> 'number',
			'fieldonly'	=> '1',
		),
		'column_footer4'	=> array(
			'name'	=> 'column_footer4',
			'type'	=> 'number',
			'desc' => __( 'Columns', 'advantage' ),
			'fieldonly'	=> '1',
		),
		'column_home1'	=> array(
			'name'	=> 'column_home1',
			'type'	=> 'number',
			'fieldonly'	=> '1',
		),
		'column_home2'	=> array(
			'name'	=> 'column_home2',
			'type'	=> 'number',
			'fieldonly'	=> '1',
		),
		'column_home3'	=> array(
			'name'	=> 'column_home3',
			'type'	=> 'number',
			'fieldonly'	=> '1',
		),
		'column_home4'	=> array(
			'name'	=> 'column_home4',
			'type'	=> 'number',
			'fieldonly'	=> '1',
		),
		'column_home5'	=> array(
			'name'	=> 'column_home5',
			'type'	=> 'number',
			'desc' => __( 'Columns', 'advantage' ),
			'fieldonly'	=> '1',
		),
//Home Page
		'homepage'	=> array(
			'name'	=> 'homepage',
			'label'	=> __( 'Home Page Style', 'advantage' ),
			'type'	=> 'radio',
			'values' => array(
				array( 'key' => 1,
							   'label' => __( 'Featured Home', 'advantage' ) ),
				array( 'key' => 2,
							   'label' => __( 'Blog', 'advantage' ) ),
						),		
		),
		'fp_option'	=> array(
			'name'	=> 'fp_option',
			'label'	=> __( 'Posts for Carousel', 'advantage' ),
			'type'	=> 'radio',
			'values' => array(
				array( 'key' => 1,
							   'label' => __( 'Featured Category', 'advantage' ) ),
				array( 'key' => 2,
							   'label' => __( 'Featured Posts', 'advantage' ) ),
						),		
		),
		'fp_effect'	=> array(
			'name'	=> 'fp_effect',
			'label'	=> __( 'Animation', 'advantage' ),
			'type'	=> 'radio',
			'values' => array(
				array( 'key' => 'slide',
							   'label' => __( 'Slide', 'advantage' ) ),
				array( 'key' => 'fade',
							   'label' => __( 'Fade', 'advantage' ) ),
						),		
		),
		'fp_category'	=> array(
			'name'	=> 'fp_category',
			'label'	=> __( 'Featured Category', 'advantage' ),
			'type'	=> 'category',	
		),		
// Top Bar
		'brandname'	=> array(
			'name'	=> 'brandname',
			'label'	=> __( 'Brand Name', 'advantage' ),
			'type'	=> 'text',
		),
		'brandlogo'	=> array(
			'name'	=> 'brandlogo',
			'label'	=> __( 'Brand Logo URL', 'advantage' ),
			'type'	=> 'url',
		),
		'menupos'	=> array(
			'name'	=> 'menupos',
			'label'	=> __( 'Top Menu Position', 'advantage' ),
			'type'	=> 'radio',
			'values' => array(
				array( 'key' => 'left',
							   'label' => __( 'Left', 'advantage' ) ),
				array( 'key' => 'right',
							   'label' => __( 'Right', 'advantage' ) ),
						),		
		),
// Skins
		'colorscheme'	=> array(
			'name'	=> 'colorscheme',
			'label'	=> __( 'Color Scheme', 'advantage' ),
			'type'	=> 'select',
			'values' => advantage_scheme_options(),
		),
		'schemecss'	=> array(
			'name'	=> 'schemecss',
			'type'	=> 'hidden',
		),
		'headerbg'	=> array(
			'name'	=> 'headerbg',
			'label'	=> __( 'Header Background', 'advantage' ),
			'type'	=> 'color',
		),
		'titlebarbg'	=> array(
			'name'	=> 'titlebarbg',
			'label'	=> __( 'Title Bar Background', 'advantage' ),
			'type'	=> 'color',
		),
		'contentbg'	=> array(
			'name'	=> 'contentbg',
			'label'	=> __( 'Content Background', 'advantage' ),
			'type'	=> 'color',
		),
		'footerbg'	=> array(
			'name'	=> 'footerbg',
			'label'	=> __( 'Footer Background', 'advantage' ),
			'type'	=> 'color',
		),
//Fonts
		'bodyfont'	=> array(
			'name'	=> 'bodyfont',
			'label'	=> __( 'Body / Paragraph', 'advantage' ),
			'type'	=> 'font',	
			'values' => $advantage_fonts,
		),
		'sitetitlefont'	=> array(
			'name'	=> 'sitetitlefont',
			'label'	=> __( 'Site Title', 'advantage' ),
			'type'	=> 'font',	
			'values' => $advantage_fonts,
		),
		'sitedescfont'	=> array(
			'name'	=> 'sitedescfont',
			'label'	=> __( 'Site Description', 'advantage' ),
			'type'	=> 'font',	
			'values' => $advantage_fonts,
		),
		'entrytitlefont'	=> array(
			'name'	=> 'entrytitlefont',
			'label'	=> __( 'Post/Page Title', 'advantage' ),
			'type'	=> 'font',
			'values' => $advantage_fonts,
		),
		'headingfont'	=> array(
			'name'	=> 'headingfont',
			'label'	=> __( 'Heading (H1 - H6)', 'advantage' ),
			'type'	=> 'font',
			'values' => $advantage_fonts,
		),
		'sidebarfont'	=> array(
			'name'	=> 'sidebarfont',
			'label'	=> __( 'Sidebar', 'advantage' ),
			'type'	=> 'font',
			'values' => $advantage_fonts,
		),
		'widgettitlefont'	=> array(
			'name'	=> 'widgettitlefont',
			'label'	=> __( 'Widget Title', 'advantage' ),
			'type'	=> 'font',
			'values' => $advantage_fonts,
		),
		'footerfont'	=> array(
			'name'	=> 'footerfont',
			'label'	=> __( 'Footer', 'advantage' ),
			'type'	=> 'font',
			'values' => $advantage_fonts,
		),
		'mainmenufont'	=> array(
			'name'	=> 'mainmenufont',
			'label'	=> __( 'Main Menu', 'advantage' ),
			'type'	=> 'font',
			'values' => $advantage_fonts,
		),

		'otherfont1'	=> array(
			'name'	=> 'otherfont1',
			'label'	=> __( 'Google Font 1', 'advantage' ),
			'type'	=> 'text',
		),
		'otherfont2'	=> array(
			'name'	=> 'otherfont2',
			'label'	=> __( 'Google Font 2', 'advantage' ),
			'type'	=> 'text',
		),
		'otherfont3'	=> array(
			'name'	=> 'otherfont3',
			'label'	=> __( 'Google Font 3', 'advantage' ),
			'type'	=> 'text',
		),
		'otherfont4'	=> array(
			'name'	=> 'otherfont4',
			'label'	=> __( 'Google Font 4', 'advantage' ),
			'type'	=> 'text',
			'helptext' => 'Enter Font Name only, e.g. Open Sans',	
		),
// bbPress and BuddyPress
		'bbp_column1'	=> array(
			'name'	=> 'bbp_column1',
			'label'	=> __( 'Content Width', 'advantage' ),
			'type'	=> 'number',
			'desc' => __( 'Columns', 'advantage' ),
		),
		'bbp_column2'	=> array(
			'name'	=> 'bbp_column2',
			'label'	=> __( 'Sidebar Width', 'advantage' ),
			'type'	=> 'number',
			'desc' => __( 'Columns', 'advantage' ),	
		),
		'bbp_position'	=> array(
			'name'	=> 'bbp_position',
			'label'	=> __( 'Sidebar Position', 'advantage' ),
			'type'	=> 'radio',		
			'values' => array(
						array( 'key' => 1, 'label' => __( 'Left ', 'advantage' ) ),
						array( 'key' => 2, 'label' => __( 'Right ', 'advantage' ) ),
						),
		),
// Custom CSS
		'advantage_inline_css'	=> array(
			'name'	=> 'advantage_inline_css',
			'label'	=> __( 'Custom CSS Style', 'advantage' ),
			'type'	=> 'textarea',
			'row'   => 40,
		),
		'advantage_scheme_css'	=> array(
			'name'	=> 'advantage_scheme_css',
			'type'	=> 'hidden',
		),
	);
	return apply_filters( 'advantage_theme_options_array', $theme_options );
}

function advantage_theme_options_display_page() {
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
?>
    <div class="wrap">
<?php	screen_icon();
  		echo "<h2>" . __('advantage Theme Options', 'advantage') . "</h2>";
		if ( false !== $_REQUEST['settings-updated'] ) { ?>
			<div class="updated fade"><p><strong><?php _e('Options Saved', 'advantage'); ?></strong></p></div>
<?php	} ?>
		<p><a class="btn btn-primary" href="<?php _e('http://xinthemes.com/documentation/','advantage'); ?>" target="_blank"><strong><?php _e('Documentation','advantage'); ?></strong></a>&nbsp;&nbsp;
		<a class="btn btn-warning" href="<?php _e('http://xinthemes.com/advantage-change-log/','advantage'); ?>" target="_blank"><strong><?php _e('Change Log','advantage'); ?></strong></a>&nbsp;&nbsp;
		<a class="btn btn-success" href="<?php _e('http://xinthemes.com/support/','advantage'); ?>" target="_blank"><strong><?php _e('Support Forum','advantage'); ?></strong></a>&nbsp;&nbsp;
		<a class="btn btn-info" href="<?php _e('http://xinthemes.com/donate/','advantage'); ?>" target="_blank"><strong><?php _e('Donate','advantage'); ?></strong></a></p>
        <form method="post" action="options.php">
<?php	
		$theme_options = advantage_theme_options_array();
		$options = advantage_get_options();
		settings_fields( 'advantage_options' );
		$tab_index = 0;
?>
		<div id="advantage-wrapper" class="container_12">
			<input id="save-button" type="submit" class="button-primary" value="<?php _e('Save Options','advantage'); ?>" />
			<div id="advantage-tabs">
				<a <?php if ( $tab_index == $options['currenttab'] ) echo 'class="advantage-current"'; $tab_index++; ?>><?php _e('Layout','advantage'); ?></a>
				<a <?php if ( $tab_index == $options['currenttab'] ) echo 'class="advantage-current"'; $tab_index++; ?>><?php _e('Scheme','advantage'); ?></a>
				<a <?php if ( $tab_index == $options['currenttab'] ) echo 'class="advantage-current"'; $tab_index++; ?>><?php _e('Fonts','advantage'); ?></a>
				<a <?php if ( $tab_index == $options['currenttab'] ) echo 'class="advantage-current"'; $tab_index++; ?>><?php _e('Social','advantage'); ?></a>
				<a <?php if ( $tab_index == $options['currenttab'] ) echo 'class="advantage-current"'; $tab_index++; ?>><?php _e('Addons','advantage'); ?></a>
				<a <?php if ( $tab_index == $options['currenttab'] ) echo 'class="advantage-current"'; $tab_index++; ?>><?php _e('Custom CSS','advantage'); ?></a>
<?php //Allow child them to add options.
				do_action( 'advantage_options_tab_link' ); ?>
			</div>
<?php
/*********************************************************************************
*  Theme Options related to site layout
**********************************************************************************/
?>
	<div class="advantage-pane clearfix"><div class="grid_12"><!-- Layout -->
	<h3><?php _e('Site Layout (12 Columns)','advantage'); ?></h3>	
<?php	advantage_option_display( $theme_options['gridwidth'], $options ); ?>
	<div class="grid_3 alpha">
		<p><b><?php _e('Content and Sidebar Width', 'advantage'); ?></b></p>
	</div>
	<div class="grid_9">
<?php
		advantage_option_display( $theme_options['content'], $options );
		advantage_option_display( $theme_options['sidebar1'], $options );
		advantage_option_display( $theme_options['sidebar2'], $options );
?>
	</div><div class="clear"></div>
<?php
		advantage_option_display( $theme_options['sidebarpos'], $options );
		advantage_option_display( $theme_options['sidebarresp'], $options );
		advantage_option_display( $theme_options['respbp'], $options );
?>
	<div class="grid_3 alpha">
		<p><b><?php _e('Home Widget Area Width', 'advantage'); ?></b></p>
	</div>
	<div class="grid_9">
<?php
		advantage_option_display( $theme_options['column_home1'], $options );
		advantage_option_display( $theme_options['column_home2'], $options );
		advantage_option_display( $theme_options['column_home3'], $options );
		advantage_option_display( $theme_options['column_home4'], $options );
		advantage_option_display( $theme_options['column_home5'], $options );
?>
	</div><div class="clear"></div>
	<div class="grid_3 alpha">
		<p><b><?php _e('Footer Widget Area Width', 'advantage'); ?></b></p>
	</div>
	<div class="grid_9">
<?php
		advantage_option_display( $theme_options['column_footer1'], $options );
		advantage_option_display( $theme_options['column_footer2'], $options );
		advantage_option_display( $theme_options['column_footer3'], $options );
		advantage_option_display( $theme_options['column_footer4'], $options );
?>
	</div><div class="clear"></div>
		<h3><?php _e('Home Page','advantage'); ?></h3>
<?php	advantage_option_display( $theme_options['homepage'], $options );
		advantage_option_display( $theme_options['fp_option'], $options );
		advantage_option_display( $theme_options['fp_category'], $options );
		advantage_option_display( $theme_options['fp_effect'], $options );
?>
			<h3><?php _e('Top Bar','advantage'); ?></h3>
<?php			advantage_option_display( $theme_options['brandname'], $options );
				advantage_option_display( $theme_options['brandlogo'], $options );				
				advantage_option_display( $theme_options['menupos'], $options );	
				do_action( 'advantage_options_tab_layout' ); ?>			
			</div></div>
<?php
/*********************************************************************************
*  Theme Options: Scheme
**********************************************************************************/
?>
	<div class="advantage-pane clearfix"><div class="grid_12">
<?php	advantage_option_display( $theme_options['colorscheme'], $options ); ?>
		<p><?php _e('Change Background Image or Color : ','advantage'); printf( __('<a href="%s">Click here</a>.', 'advantage'), admin_url('themes.php?page=custom-background')); ?></p>
<?php	advantage_option_display( $theme_options['headerbg'], $options );
		advantage_option_display( $theme_options['titlebarbg'], $options );
		advantage_option_display( $theme_options['contentbg'], $options );
		advantage_option_display( $theme_options['footerbg'], $options );
		do_action( 'advantage_options_tab_skinning' );
?>
	</div></div>	
<?php
/**************************************
* Theme Options - Fonts  *
**************************************/
?>
			<div class="advantage-pane clearfix"><div class="grid_12">
			<p><?php _e( 'You do not need to select font for each element. For example. Body, paragraph and heading define the general fonts used. <span style="color:blue;font-weight:bold;">Please note that blue indicates webfonts (e.g Google Fonts) which may require additional load time.</span>', 'advantage' ); ?></p>
<?php 
			advantage_option_display( $theme_options['bodyfont'], $options );
			advantage_option_display( $theme_options['headingfont'], $options );
?>
			<hr>
<?php
			advantage_option_display( $theme_options['sitetitlefont'], $options );
			advantage_option_display( $theme_options['sitedescfont'], $options );
?>
			<hr>
<?php
			advantage_option_display( $theme_options['entrytitlefont'], $options );
			advantage_option_display( $theme_options['widgettitlefont'], $options );
			advantage_option_display( $theme_options['sidebarfont'], $options );
			advantage_option_display( $theme_options['mainmenufont'], $options );
			advantage_option_display( $theme_options['footerfont'], $options );
?>
			<h3><?php _e( 'Additional Google Fonts', 'advantage' ); ?></h3>
<?php
			advantage_option_display( $theme_options['otherfont1'], $options );
			advantage_option_display( $theme_options['otherfont2'], $options );
			advantage_option_display( $theme_options['otherfont3'], $options );
			advantage_option_display( $theme_options['otherfont4'], $options );
			do_action( 'advantage_options_tab_fonts' );
?>
			</div></div>	
<?php
/*********************************************************************************
*  Theme Options related to social network
**********************************************************************************/
?>
			<div class="advantage-pane clearfix"><div class="grid_12"><!-- Social -->
			
			<div class="grid_3 alpha"><p><b><?php _e('Social URLs', 'advantage'); ?></b></p></div>
			<div class="grid_9">
			<?php $social_links = advantage_social_links();
			foreach ($social_links as $link ) { ?>
				<div class="social-links">
				<span class="<?php echo $link['name']; ?>"></span>
				</div>
				<div class="grid_2">
				<p><?php echo esc_attr($link['label']); ?></p>
				</div>
				<div class="grid_8">
				<p><input type="text" size="50" name="advantage_theme_options[<?php echo $link['name']; ?>]" value="<?php echo esc_url( $options[$link['name']] ); ?>" /></p></div>
				<div class="clear"></div>
			<?php } ?>
			</div>			
			<div class="clear"></div>						
<?php			do_action('advantage_options_tab_social'); ?>
			</div></div><!-- Sharing -->
<?php
/*********************************************************************************
*  Addon Options
**********************************************************************************/
?>
		<div class="advantage-pane clearfix"><div class="grid_12"><!-- Addons -->
		<h3><?php _e('bbPress/BuddyPress Options','advantage') ?></h3>
<?php
		advantage_option_display( $theme_options['bbp_column1'], $options );
		advantage_option_display( $theme_options['bbp_column2'], $options );
		advantage_option_display( $theme_options['bbp_position'], $options );
//Allow child them to add options.
		do_action( 'advantage_options_tab_addon' ); 
?>
		</div></div><!-- Addons -->
<?php
/*********************************************************************************
*  Custom CSS
**********************************************************************************/
?>
		<div class="advantage-pane clearfix"><div class="grid_12"><!-- Custom CSS -->
<?php
		advantage_option_display( $theme_options['advantage_inline_css'], $options );	
?>
		</div></div><!-- Custom CSS -->
<?php
/*********************************************************************************
*  Child Theme Options
**********************************************************************************/
?>
		<div class="advantage-pane clearfix"><div class="grid_12">

<?php	do_action( 'advantage_options_tab_page' ); ?>
		</div></div>
<?php	advantage_option_display($theme_options['currenttab'], $options);
      	advantage_option_display($theme_options['schemecss'], $options);
		advantage_option_display($theme_options['advantage_scheme_css'], $options);
?>
		<p><input id="save-button-bottom" type="submit" class="button-primary" value="<?php _e( 'Save Options', 'advantage' ); ?>" /></p>
		</div><!-- advantage-wrapper -->
        </form>
    </div><!-- wrap -->
<?php
}
		
function advantage_theme_options_validate( $input ) {
	$theme_options = advantage_theme_options_array();
	foreach ( $theme_options as $theme_option ) {
		switch ( $theme_option['type'] ) {
			case 'checkbox':
				if ( ! isset( $input[ $theme_option['name'] ] ) )
					$input[$theme_option['name']] = null;
		    	$input[ $theme_option['name'] ] = ( $input[ $theme_option['name'] ] == 1 ? 1 : 0 );
				break;
			case 'text':
			case 'textarea':
				$input[ $theme_option['name'] ] = wp_kses_stripslashes( $input[ $theme_option['name'] ] );
				break;
			case 'number':	
				$input[ $theme_option['name'] ] = intval( $input[ $theme_option['name'] ] );	
				break;				
			case 'url':	
				$input[ $theme_option['name'] ] = esc_url_raw( $input[$theme_option['name'] ] );	
				break;
			case 'color':
				$input[ $theme_option['name'] ] = preg_replace( '|^#([A-Fa-f0-9]{3}){1,2}$|', '',  $input[ $theme_option['name'] ] );	
				break;
		}
	}
	//URL
	$input['url_facebook'] = esc_url_raw( $input['url_facebook'] );
	$input['url_linkedin'] = esc_url_raw( $input['url_linkedin'] );
	$input['url_twitter'] = esc_url_raw( $input['url_twitter'] );
	$input['url_gplus'] = esc_url_raw( $input['url_gplus'] );
	$input['url_vimeo'] = esc_url_raw( $input['url_vimeo'] );
	$input['url_youtube'] = esc_url_raw( $input['url_youtube'] );
	$input['url_flickr'] = esc_url_raw( $input['url_flickr'] );
	$input['url_instagram'] = esc_url_raw( $input['url_instagram'] );
	$input['url_rss'] = esc_url_raw( $input['url_rss'] );
	if ( $input['respbp'] < 960 )
		$input['respbp'] = 960;
	$input['advantage_scheme_css'] = advantage_scheme_css( $input );
	//Update Scheme Options
	$options = advantage_get_options();
	if ( $input['colorscheme'] != $options['colorscheme'] ) {
		$scheme = $theme_options['colorscheme']['values'][ $input['colorscheme'] ];
		$input['schemecss'] = $scheme['css']; 
		foreach ( $scheme['options'] as $scheme_options )
			$input[ $scheme_options['name'] ] = $scheme_options['value'];
	}
	return $input;
}

function advantage_scheme_css($input) {
	$advantage_fonts = advantage_fonts_array();
	$css = '';
	if ( 1080 != $input['gridwidth'] ) {
		$css .= '.row, .contain-to-grid .top-bar {max-width: ' . $input['gridwidth'] . 'px; }' . "\n";	
	}
	if ( 1 == $input['sidebarresp'] && 3 != $input['sidebarpos'] ) {
		if ( ( $input['content'] + $input['sidebar1'] + $input['sidebar2']) <= 12 ) {
			$pct = 8.547008547 * ( $input['sidebar1'] + $input['sidebar2'] ) - 2.764102564;
			$css .= '@media only screen and (min-width: 768px) ';
			$css .= 'and (max-width: ' . $input['respbp'] . 'px) {' . "\n";
			$css .= '#sidebar_one,#sidebar_two { width: ' . $pct;
			$css .= '%; float: left; }}' . "\n";
		}
	}
	if ( 1 == $input['sidebarresp'] ) {
		$pct = 48.71794872;
		$css .= '@media only screen and (min-width: 481px) ';
		$css .= 'and (max-width: 767px) {' . "\n";
		$css .= '#sidebar_one,#sidebar_two { width: ' . $pct;
		$css .= '%;  float: left; } #sidebar_two { margin-left: 2.564102564%; } }' . "\n";
	}
	if ( $input['bodyfont'] > 0 )
		$css .= 'body {font-family:' . $advantage_fonts[ $input['bodyfont'] ]['family'] . ';}' . "\n";
	if ( $input['headingfont'] > 0 )
		$css .= 'h1, h2, h3, h4, h5, h6 {font-family:' . $advantage_fonts[$input['headingfont']]['family'] . ';}' . "\n";
	if ( $input['entrytitlefont'] > 0 )
		$css .= '.entry-title {font-family:' . $advantage_fonts[$input['entrytitlefont']]['family'] . ';}' . "\n";
	if ( $input['sitetitlefont'] > 0 )
		$css .= '#site-title {font-family:' . $advantage_fonts[$input['sitetitlefont']]['family'] . ';}' . "\n";
	if ( $input['sitedescfont'] > 0 )
		$css .= '#site-description {font-family:' . $advantage_fonts[$input['sitedescfont']]['family'] . ';}' . "\n";
	if ( $input['widgettitlefont'] > 0 )
		$css .= '.widget-title {font-family:' . $advantage_fonts[$input['widgettitlefont']]['family'] . ';}' . "\n";
	if ( $input['sidebarfont'] > 0 )
		$css .= '.blog-widgets {font-family:' . $advantage_fonts[$input['sidebarfont']]['family'] . ';}' . "\n";
	if ( $input['footerfont'] > 0 )
		$css .= '#footer {font-family:' . $advantage_fonts[$input['footerfont']]['family'] . ';}' . "\n";
	if ( $input['mainmenufont'] > 0 )
		$css .= '#topbar {font-family:' . $advantage_fonts[$input['mainmenufont']]['family'] . ';}' . "\n";
//Background
	if ( ! empty( $input['headerbg'] ) )
		$css .= '.custom-background .site-header,.site-header {background:' .  $input['headerbg'] . ';}' . "\n";
	if ( ! empty( $input['titlebarbg'] ) )
		$css .= '.custom-background .titlebar,.titlebar {background:' .  $input['titlebarbg'] . ';}' . "\n";
	if ( ! empty( $input['contentbg'] ) )
		$css .= '.custom-background .row-container,.row-container {background:' .  $input['contentbg'] . ';}' . "\n";
	if ( ! empty( $input['footerbg'] ) )
		$css .= '.custom-background #footer,#footer {background:' .  $input['footerbg'] . ';}' . "\n";
	return apply_filters( 'advantage_scheme_css', $css );
}

function advantage_option_display( $theme_option, $options ) {
	global $advantage_options, $advantage_fonts;
	if ( $theme_option['type'] != 'hidden' && empty( $theme_option['fieldonly'] ) ) {
		if ( isset( $theme_option['label'] ) ) {
			echo '<div class="grid_3 alpha">';	
			echo '<p><b>' . $theme_option['label'] . '</b></p></div>';		
		}
		echo '<div class="grid_9"><p>';		
	}
	switch ( $theme_option['type'] ) {
		case 'radio':
			$values = $theme_option['values'];
			foreach ( $values as $value ) {
				printf( '<input id="advantage_theme_options[%1$s]_%2$s" name="advantage_theme_options[%1$s]" type="radio" value="%2$s" %3$s />',
					$theme_option['name'],
				 	$value['key'],
				 	checked( $value['key'], $options[$theme_option['name']], false ) );
				printf( '<label class="description" for="advantage_theme_options[%1$s]_%2$s">%3$s</label>',
					$theme_option['name'],
					$value['key'],
					esc_attr( $value['label'] )	);
			}
			break;
		case 'checkbox':
			printf( '<input id="advantage_theme_options[%1$s]" name="advantage_theme_options[%1$s]" type="checkbox" value="1" %2$s />',
					$theme_option['name'],
				 	checked( '1', $options[$theme_option['name']], false ) );
				printf( '<label class="description" for="advantage_theme_options[%1$s]">%2$s</label>',
					$theme_option['name'],
					esc_attr( $theme_option['desc'] )	);
			break;				
		case 'url':
		case 'text':
			printf( '<input name="advantage_theme_options[%s]" type="text" value="%s" size="80" />',
					$theme_option['name'],
				 	esc_attr( $options[$theme_option['name']] ) );
			break;
		case 'color':
			printf( '<input name="advantage_theme_options[%1$s]" type="text" value="%2$s" class="advantage-color-field" />',
					$theme_option['name'],
				 	esc_attr( $options[$theme_option['name']] ) );
			break;
		case 'textarea':
			printf( '<textarea name="advantage_theme_options[%s]" cols="120" rows="%s">%s</textarea>',
					$theme_option['name'],
					$theme_option['row'], 
				 	esc_textarea( $options[ $theme_option['name'] ] ) );
			break;
		case 'number':
			if ( ! empty( $theme_option['fieldonly'] ) && ! empty( $theme_option['label'] ) )
				printf( '<label class="description">%s</label>', esc_attr( $theme_option['label'] ) );
			printf( '<input name="advantage_theme_options[%s]" type="text" value="%s" size="4" />',
					$theme_option['name'],
				 	esc_attr( $options[ $theme_option['name'] ] ) );
			if ( ! empty( $theme_option['desc'] ) )
				printf( '<label class="description">%s</label>', esc_attr( $theme_option['desc'] ) );
			echo '&nbsp;&nbsp;&nbsp;&nbsp;';
			break;
		case 'select':
			printf( '<select name="advantage_theme_options[%s]" >',
				$theme_option['name'] );
			foreach ( $theme_option['values'] as $value ) {
				printf ('<option value="%1$s" %2$s>%3$s</option>',
					$value['key'],
					selected( $options[$theme_option['name']], $value['key'], false ),
					$value['label'] );
			}
			echo '</select>';
			break;
		case 'font':
			printf( '<select style="font-family:%2$s;font-size:14px;" name="advantage_theme_options[%1$s]" >',
				$theme_option['name'],
				$advantage_fonts[ $options[ $theme_option['name'] ] ]['family'] );
			$old_font_type = '';
			foreach ( $theme_option['values'] as $value ) {
				if ( $value['type'] != $old_font_type ) {
					if ( $old_font_type != '' )
						echo '</optgroup>';
					printf( '<optgroup label="%1$s">', $value['type'] );					
				}
				printf( '<option style="font-family: %4$s;%5$s" value="%1$s" %2$s>%3$s</option>',
					$value['key'],
					selected( $options[ $theme_option['name'] ], $value['key'], false ),
					$value['label'],
					$value['family'],
					( empty( $value['url'] ) ? '' : 'color:blue;' ) );
				$old_font_type = $value['type'];	
			}
			echo '</optgroup>';
			echo '</select>';
			printf( '&nbsp;&nbsp;<span style="font-family:%2$s;font-size:16px;%3$s">%1$s</span>',
				'The quick brown fox jumps over the lazy dog.',
				$advantage_fonts[$options[$theme_option['name']]]['family'],
				( empty($advantage_fonts[ $options[ $theme_option['name'] ] ]['url'] ) ? '' : 'color:blue;' ) );
			break;
		case 'category':
			printf( '<select name="advantage_theme_options[%s]" >',
				$theme_option['name'] );
			$selected_category = $options[ $theme_option['name'] ];
			printf( '<option value="0" %1$s>%2$s</option>',
					selected( $options[ $theme_option['name'] ], 0, false ),
					__('All Categories','advantage') );

			foreach ( advantage_categories() as $option ) {
				printf( '<option value="%1$s" %2$s>%3$s</option>',
					$option->term_id,
					selected( $selected_category, $option->term_id, false ),
					$option->name );
			}
			echo '</select>';
			break;
		case 'hidden':
			printf( '<input id="%1$s" name="advantage_theme_options[%1$s]" type="hidden" value="%2$s" />',
					$theme_option['name'],
				 	esc_attr( $options[ $theme_option['name'] ] ) );
			break;
		default:
			echo __( 'Not Availavle Yet', 'advantage' );			
	}
	if ( $theme_option['type'] != 'hidden' && empty( $theme_option['fieldonly'] ) ) {
		echo '</p>';
		if ( ! empty( $theme_option['helptext'] ) )
			printf( '<p><label class="helptext">%s</label></p>', $theme_option['helptext']);
		echo '</div><div class="clear"></div>';	
	}
}
