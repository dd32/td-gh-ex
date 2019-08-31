<?php
/**
 * General settings functions.
 *
 * @package ThinkUpThemes
 */

/* ----------------------------------------------------------------------------------
	Logo Settings
---------------------------------------------------------------------------------- */

function thinkup_custom_logo() {

	$output = NULL;

    // Get logo image url if image has been assigned.
	$check_logoset = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

	if ( ! empty( $check_logoset[0] ) ) {
	   if ( function_exists( 'the_custom_logo' ) ) {
			$output = get_custom_logo();
		}
	} else {
		$output .= '<a rel="home" href="' . esc_url( home_url( '/' ) ) . '">';
		$output .= '<h1 rel="home" class="site-title" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</h1>';
		$output .= '<h2 class="site-description" title="' . esc_attr( get_bloginfo( 'description', 'display' ) ) . '">' . esc_html( get_bloginfo( 'description' ) ) . '</h2>';
		$output .= '</a>';
	}

	// Output logo is set
	if ( ! empty( $output ) ) {
		return $output;
	}
}


//----------------------------------------------------------------------------------
//	Page Layout
//----------------------------------------------------------------------------------

// Add Custom Sidebar css
function thinkup_sidebar_css($classes) {

// Get theme options values.
$thinkup_homepage_layout = thinkup_var ( 'thinkup_homepage_layout' );
$thinkup_general_layout  = thinkup_var ( 'thinkup_general_layout' );
$thinkup_blog_layout     = thinkup_var ( 'thinkup_blog_layout' );
$thinkup_post_layout     = thinkup_var ( 'thinkup_post_layout' );

	$class_sidebar = NULL;

	if ( is_front_page() ) {
		if ( $thinkup_homepage_layout == "option1" or empty( $thinkup_homepage_layout ) ) {		
			$class_sidebar = '';
		} else if ( $thinkup_homepage_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $thinkup_homepage_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( is_page() ) {	
		if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
			$class_sidebar = '';
		} else if ( $thinkup_general_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $thinkup_general_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( thinkup_check_isblog() and ! is_single() ) {
		if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
			$class_sidebar = '';
		} else if ( $thinkup_blog_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $thinkup_blog_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		}
	} else if ( is_single() ) {	
		if ( $thinkup_post_layout == "option1" or empty( $thinkup_post_layout ) ) {		
			$class_sidebar = '';
		} else if ( $thinkup_post_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ( $thinkup_post_layout == "option3" ) {
			$class_sidebar = 'layout-sidebar-right';
		} else {
			$class_sidebar = '';
		}
	} else if ( is_search() ) {
		if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
			$class_sidebar = '';
		} else if ( $thinkup_general_layout == "option2" ) {
			$class_sidebar = 'layout-sidebar-left';
		} else if ($thinkup_general_layout == "option3") {
			$class_sidebar = 'layout-sidebar-right';
		}
	}

	// Output sidebar class
	if( ! empty( $class_sidebar ) ) {
		$classes[] = $class_sidebar;
	} else {
		$classes[] = 'layout-sidebar-none';
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_sidebar_css' );

// Add Custom Sidebar html
function thinkup_sidebar_html() {

// Get theme options values.
$thinkup_homepage_layout = thinkup_var ( 'thinkup_homepage_layout' );
$thinkup_general_layout  = thinkup_var ( 'thinkup_general_layout' );
$thinkup_blog_layout     = thinkup_var ( 'thinkup_blog_layout' );
$thinkup_post_layout     = thinkup_var ( 'thinkup_post_layout' );

	do_action('thinkup_sidebar_html');

	if ( is_front_page() ) {	
		if ( $thinkup_homepage_layout == "option1" or empty( $thinkup_homepage_layout ) ) {		
				echo '';
		} else if ( $thinkup_homepage_layout == "option2" ) {
				echo get_sidebar(); 
		} else if ( $thinkup_homepage_layout == "option3" ) {
				echo get_sidebar();
		}
	} else if ( is_page() ) {
		if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
			echo '';
		} else if ( $thinkup_general_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $thinkup_general_layout == "option3" ) {
			echo get_sidebar();
		}
	} else if ( thinkup_check_isblog() and ! is_single() ) {
		if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
			echo '';
		} else if ( $thinkup_blog_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $thinkup_blog_layout == "option3" ) {
			echo get_sidebar();
		}
	} else if ( is_single() ) {	
		if ( $thinkup_post_layout == "option1" or empty( $thinkup_post_layout ) ) {
			echo '';
		} else if ( $thinkup_post_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $thinkup_post_layout == "option3" ) {
			echo get_sidebar();
		} else {
			echo '';
		}
	} else if ( is_search() ) {
		if ( $thinkup_general_layout == 'option1' or empty( $thinkup_general_layout ) ) {		
			echo '';
		} else if ( $thinkup_general_layout == "option2" ) {
			get_sidebar();
		} else if ( $thinkup_general_layout == "option3" ) {
			get_sidebar();
		}
	}
}


//----------------------------------------------------------------------------------
//	Select a Sidebar
//----------------------------------------------------------------------------------

// Add Selected Sidebar To Specific Pages
function thinkup_input_sidebars() {

// Get theme options values.
$thinkup_general_sidebars   = thinkup_var ( 'thinkup_general_sidebars' );
$thinkup_homepage_sidebars  = thinkup_var ( 'thinkup_homepage_sidebars' );
$thinkup_blog_sidebars      = thinkup_var ( 'thinkup_blog_sidebars' );
$thinkup_post_sidebars      = thinkup_var ( 'thinkup_post_sidebars' );
$thinkup_portfolio_sidebars = thinkup_var ( 'thinkup_portfolio_sidebars' );
$thinkup_project_sidebars   = thinkup_var ( 'thinkup_project_sidebars' );

	if ( is_front_page() ) {	
		$output = $thinkup_homepage_sidebars;
	} else if ( is_page() ) {
		$output = $thinkup_general_sidebars;
	} else if ( thinkup_check_isblog() and ! is_single() ) {
		$output = $thinkup_blog_sidebars;
	} else if ( is_single() ) {	
		$output = $thinkup_post_sidebars;
	} else if ( is_search() ) {	
		$output = $thinkup_general_sidebars;
	}

	if ( empty( $output ) or $output == 'Select a sidebar:' ) {
		$output = 'Sidebar';
	}

	return $output;
}


//----------------------------------------------------------------------------------
//	Intro Default options
//----------------------------------------------------------------------------------

// Add custom intro section [Extend for more options in future update]
function thinkup_custom_intro() {

	if ( ! is_front_page() ) {
		echo	'<div id="intro" class="option1"><div class="wrap-safari"><div id="intro-core">',
				'<h1 class="page-title"><span>',
				thinkup_title_select(),
				'</span></h1>',
				thinkup_input_breadcrumbswitch(),
				'</div></div></div>';
	} else {
		echo '';
	}
}


//----------------------------------------------------------------------------------
//	Enable Breadcrumbs
//----------------------------------------------------------------------------------

// Toggle Breadcrumbs
function thinkup_input_breadcrumbswitch() {

// Get theme options values.
$thinkup_general_breadcrumbswitch = thinkup_var ( 'thinkup_general_breadcrumbswitch' );

	if( ! is_front_page() ) {
		if ( $thinkup_general_breadcrumbswitch == '0' or empty( $thinkup_general_breadcrumbswitch ) ) {
			echo '';
		} else if ( $thinkup_general_breadcrumbswitch == '1' ) {
			thinkup_input_breadcrumb();
		}
	}
}


//----------------------------------------------------------------------------------
//	Enable Responsive Layout
//----------------------------------------------------------------------------------

// http://wordpress.stackexchange.com/questions/27497/how-to-use-wp-nav-menu-to-create-a-select-menu-dropdown
class thinkup_nav_menu_responsive extends Walker_Nav_Menu {

    // don't output children opening tag (`<ul>`)
    public function start_lvl(&$output, $depth=0, $args=array()){}

    // don't output children closing tag    
    public function end_lvl(&$output, $depth=0, $args=array()){}

    public function start_el(&$output, $item, $depth=0, $args=array(), $id = 0){

      // add spacing to the title based on the current depth
      $item->title = str_repeat("&#45; ", $depth ) . $item->title;
      parent::start_el($output, $item, $depth, $args);
	  
	  $output = str_replace( '<a', '<option', $output );
	  $output = str_replace( 'href=', 'value=', $output );

  } 
	
    // replace closing </li> with the closing option tag
    public function end_el(&$output, $item, $depth=0, $args=array()){
	  $output = str_replace( '</a>', '</option>', $output );
    }
}

// Fallback responsive menu when custom header menu has not been set.
function thinkup_input_responsivefall() {

	$output = wp_list_pages('echo=0&title_li=');
	$output = str_replace( '<a', '<option', $output );
	$output = str_replace( 'href=', 'value=', $output );
	$output = str_replace( '</a>', '</option>', $output );

	$output = strip_tags( $output, '<div>, <select>, <option>' );

	echo '<div id="header-responsive">',
		 '<select onchange="location = this.options[this.selectedIndex].value;"><option value="#">' . __( 'Navigation', 'engrave-lite') . '</option>' . $output . '</select>',
		 '</div>';
}

function thinkup_input_responsivehtml() {

// Get theme options values.
$thinkup_general_fixedlayoutswitch = thinkup_var ( 'thinkup_general_fixedlayoutswitch' );

	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {
		
		$args = array(
			'theme_location' => 'header_menu',
			'items_wrap'     => '<select onchange="location = this.options[this.selectedIndex].value;"><option value="#">' . __( 'Navigation', 'engrave-lite') . '</option>%3$s</select>',
			'container'      => false,
			'echo'           => false,
			'walker'         => new thinkup_nav_menu_responsive(),
			'depth'          => 0,
			'fallback_cb'     => 'thinkup_input_responsivefall',
		);
		$menu = strip_tags(wp_nav_menu( $args ), '<div>, <select>, <option>' );

		if ( has_nav_menu( 'header_menu' ) ) {
			echo '<div id="header-responsive">' . $menu . '</div>';
		}
	}
}

function thinkup_input_responsivecss() {

// Get theme options values.
$thinkup_general_fixedlayoutswitch = thinkup_var ( 'thinkup_general_fixedlayoutswitch' );

	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {
		wp_enqueue_style ( 'thinkup-responsive' );
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_input_responsivecss', '12' );

function thinkup_input_responsiveclass($classes){

// Get theme options values.
$thinkup_general_fixedlayoutswitch = thinkup_var ( 'thinkup_general_fixedlayoutswitch' );

	if ( $thinkup_general_fixedlayoutswitch == '1' ) {
		$classes[] = 'layout-fixed';
	} else {
		$classes[] = 'layout-responsive';	
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_responsiveclass');


/* ----------------------------------------------------------------------------------
	BACK UP OPTIONS TO PAGE "ENGRAVE CREATED CONTENT BACKUP"
---------------------------------------------------------------------------------- */

function thinkup_backup_options() {
global $wp_customize;

	// Get theme options values.
	$thinkup_general_backupswitch = thinkup_var ( 'thinkup_general_backupswitch' );

	// Only backup options is the backup option is enabled
	if ( $thinkup_general_backupswitch == '1' ) {

		// Set output variable to avoid php errors
		$output_header  = NULL;
		$output_content = NULL;

		// Create post array
		$postarray = array();

		// Get ThinkUp options array.
		$thinkup_redux_variables        = get_option( 'thinkup_redux_variables' );

		// Create array of ThinkUp content options currently used
		foreach ( $thinkup_redux_variables as $key => $value ) {
		
			// Get options type and label
			$type  = $wp_customize->get_control( $key )->type;
			$label = $wp_customize->get_control( $key )->label;
		
			// Create output content for "text" and "textarea" options
			if ( $type == 'text' or $type == 'textarea' ) {

				if (strpos($label, 'HIDDEN_LABEL_') !== false) {
					$label = str_replace( 'HIDDEN_LABEL_', '', $label );
				}

				$output_content .= '<h3>' . $label . ' (option: ' . $key . ')</h3>' . "\n";
				$output_content .= '<ul><li>' . $value . '</li></ul>' . "\n" . "\n";
			}
		}

		// Create content for start of backup page
		$output_header   = '';
		$output_header  .= '<-----------------------------------------------------------' . "\n";
		$output_header  .= esc_html__( 'Engrave Lite Created Content Backup', 'engrave-lite' ) . "\n";
		$output_header  .= esc_html__( 'This page contains a backup of content created by the Engrave Lite WordPress Theme. ', 'engrave-lite' );
		$output_header  .= esc_html__( 'The purpose for the backup is to prevent content loss on theme switch.', 'engrave-lite' );
		$output_header  .= esc_html__( 'When a user switches themes this content will still be available to the user when setting up their site on the new theme.', 'engrave-lite' ) . "\n";
		$output_header  .= esc_html__( 'Please note the following : ', 'engrave-lite' ) . "\n";
		$output_header  .= ' * ' . esc_html__( 'Leave this page as private, available only to users with admin privledges.', 'engrave-lite' ) . "\n";
		$output_header  .= ' * ' . esc_html__( 'You can delete this page any time and regenerate it from within the Engrave Lite options menu, General section.', 'engrave-lite' ) . "\n";
		$output_header  .= '----------------------------------------------------------->' . "\n";
		$output_header  .= "\n" . "\n";

		// Backup page setup.
		$postarray['post_title']     = 'Engrave Lite Created Content Backup'; // translate ok.
		$postarray['post_type']      = 'page';
		$postarray['post_status']    = 'private';
		$postarray['comment_status'] = 'closed';
		$page                        = get_page_by_title( 'Engrave Lite Created Content Backup' );
		if ( isset( $page ) && '' !== $page->ID ) {
			$postarray['ID']           = $page->ID;
			$postarray['post_content'] = $output_header . $output_content;
			wp_update_post( $postarray );
		} else {
			$postarray['ID']           = 0;
			$postarray['post_content'] = $output_header . $output_content;
			wp_insert_post( $postarray );
		}
	}
}
add_action( 'customize_save_after', 'thinkup_backup_options' );


?>