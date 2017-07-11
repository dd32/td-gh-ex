<?php
/**
 * General settings functions.
 *
 * @package ThinkUpThemes
 */

//----------------------------------------------------------------------------------
//	Logo Settings
//----------------------------------------------------------------------------------
 
function thinkup_custom_logo() {
global $thinkup_general_logoswitch;
global $thinkup_general_logolink;
global $thinkup_general_sitetitle;
global $thinkup_general_sitedescription;

	if ( $thinkup_general_logoswitch == "option1" ) {
		if ( ! empty( $thinkup_general_logolink ) ) {
			echo '<img src="' . esc_url( $thinkup_general_logolink ) . '" alt="' . __( 'Logo', 'lan-thinkupthemes' ) . '">';
		} 
	} else if ( $thinkup_general_logoswitch == "option2" or empty( $thinkup_general_logoswitch ) ) {
		if ( empty( $thinkup_general_sitetitle ) ) {
			echo '<h1 rel="home" class="site-title" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' . get_bloginfo( 'name' ) . '</h1>';
		} else {
			echo '<h1 rel="home" class="site-title" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '">' . esc_html( $thinkup_general_sitetitle ) . '</h1>';
		}
		if ( ! empty( $thinkup_general_sitedescription ) ) {
			echo '<h2 class="site-description">' . esc_html( $thinkup_general_sitedescription ) . '</h2>';
		}
	}
}

// Output retina js script if retina logo is set
function thinkup_input_logoretina() {
global $thinkup_general_logoswitch;
global $thinkup_general_logolinkretina;

	if ( $thinkup_general_logoswitch == "option1" ) {
		if ( ! empty( $thinkup_general_logolinkretina ) ) {
			wp_enqueue_script( 'retina' );
		} 
	}
}	
add_action( 'wp_enqueue_scripts', 'thinkup_input_logoretina', 11 );


//----------------------------------------------------------------------------------
//	Custom Favicon
//----------------------------------------------------------------------------------

function thinkup_custom_favicon() {
global $thinkup_general_faviconlink;

	if ( ! empty( $thinkup_general_faviconlink ) ) {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . esc_url( $thinkup_general_faviconlink ) . '" />';
	}	
}
add_action('wp_head', 'thinkup_custom_favicon');


//----------------------------------------------------------------------------------
//	Page Layout
//----------------------------------------------------------------------------------

// Add Custom Sidebar css
function thinkup_sidebar_css() {
global $thinkup_homepage_layout;
global $thinkup_general_layout;
global $thinkup_blog_layout;
global $thinkup_post_layout;
global $thinkup_portfolio_layout;
global $thinkup_project_layout;

global $post;
$_thinkup_meta_layout = get_post_meta( $post->ID, '_thinkup_meta_layout', true );

	if ( is_front_page() ) {
		if ( $thinkup_homepage_layout == "option1" or empty( $thinkup_homepage_layout ) ) {		
			echo '';
		} else if ( $thinkup_homepage_layout == "option2" ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $thinkup_homepage_layout == "option3" ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else if ( is_page() ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
				echo '';
			} else if ( $thinkup_general_layout == "option2" ) {
				wp_enqueue_style ( 'thinkup-sidebarleft' );
			} else if ( $thinkup_general_layout == "option3" ) {
				wp_enqueue_style ( 'thinkup-sidebarright' );
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else if ( thinkup_check_isblog() and ! is_post_type_archive( 'portfolio' ) ) {
		if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
			echo '';
		} else if ( $thinkup_blog_layout == "option2" ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $thinkup_blog_layout == "option3" ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else if ( is_post_type_archive( 'portfolio' ) ) {	
		if ( $thinkup_portfolio_layout == "option1" or empty( $thinkup_portfolio_layout ) ) {		
			echo '';
		} else if ( $thinkup_portfolio_layout == "option5" or $thinkup_portfolio_layout == "option7" ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $thinkup_portfolio_layout == "option6" or $thinkup_portfolio_layout == "option8" ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		} else {
			echo '';
		}
	} else if ( is_single() and ! is_singular( 'portfolio' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_post_layout == "option1" or empty( $thinkup_post_layout ) ) {		
				echo '';
			} else if ( $thinkup_post_layout == "option2" ) {
				wp_enqueue_style ( 'thinkup-sidebarleft' );
			} else if ( $thinkup_post_layout == "option3" ) {
				wp_enqueue_style ( 'thinkup-sidebarright' );
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else if ( is_singular( 'portfolio' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_project_layout == "option1" or empty( $thinkup_project_layout ) ) {		
				echo '';
			} else if ( $thinkup_project_layout == "option2" ) {
				wp_enqueue_style ( 'thinkup-sidebarleft' );
			} else if ( $thinkup_project_layout == "option3" ) {
				wp_enqueue_style ( 'thinkup-sidebarright' );
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else if ( is_search() ) {
		if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
			echo '';
		} else if ( $thinkup_general_layout == "option2" ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ($thinkup_general_layout == "option3") {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	} else {
		if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			wp_enqueue_style ( 'thinkup-sidebarleft' );
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			wp_enqueue_style ( 'thinkup-sidebarright' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_sidebar_css', '11' );

// Add Custom Sidebar html
function thinkup_sidebar_html() {
global $thinkup_homepage_layout;
global $thinkup_general_layout;
global $thinkup_blog_layout;
global $thinkup_post_layout;
global $thinkup_portfolio_layout;
global $thinkup_project_layout;

global $post;
$_thinkup_meta_layout = get_post_meta( $post->ID, '_thinkup_meta_layout', true );

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
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_general_layout == "option1" or empty( $thinkup_general_layout ) ) {		
				echo '';
			} else if ( $thinkup_general_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_general_layout == "option3" ) {
				echo get_sidebar();
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar(); 
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar(); 
		}
	} else if ( thinkup_check_isblog() and ! is_post_type_archive( 'portfolio' ) ) {
		if ( $thinkup_blog_layout == "option1" or empty( $thinkup_blog_layout ) ) {		
			echo '';
		} else if ( $thinkup_blog_layout == "option2" ) {
			echo get_sidebar();
		} else if ( $thinkup_blog_layout == "option3" ) {
			echo get_sidebar();
		}
	} else if ( is_post_type_archive( 'portfolio' ) ) {	
		if ( $thinkup_portfolio_layout == "option1" or empty( $thinkup_portfolio_layout ) ) {		
			echo '';
		} else if ( $thinkup_portfolio_layout == "option5" or $thinkup_portfolio_layout == "option7" ) {
			echo get_sidebar();
		} else if ( $thinkup_portfolio_layout == "option6" or $thinkup_portfolio_layout == "option8" ) {
			echo get_sidebar();
		} else {
			echo '';
		}
	} else if ( is_single() and ! is_singular( 'portfolio' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_post_layout == "option1" or empty( $thinkup_post_layout ) ) {
				echo '';
			} else if ( $thinkup_post_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_post_layout == "option3" ) {
				echo get_sidebar();
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar();
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar();
		}
	} else if ( is_singular( 'portfolio' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' ) {
			if ( $thinkup_project_layout == "option1" or empty( $thinkup_project_layout ) ) {		
				echo '';
			} else if ( $thinkup_project_layout == "option2" ) {
				echo get_sidebar();
			} else if ( $thinkup_project_layout == "option3" ) {
				echo get_sidebar();
			} else {
				echo '';
			}
		} else if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			echo get_sidebar();
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			echo get_sidebar();
		}
	} else if ( is_search() ) {
		if ( $thinkup_general_layout == 'option1' or empty( $thinkup_general_layout ) ) {		
			echo '';
		} else if ( $thinkup_general_layout == "option2" ) {
			get_sidebar();
		} else if ( $thinkup_general_layout == "option3" ) {
			get_sidebar();
		}
	} else {
		if ( $_thinkup_meta_layout == 'option2' ) {
			echo '';
		} else if ( $_thinkup_meta_layout == 'option3' ) {
			get_sidebar();
		} else if ( $_thinkup_meta_layout == 'option4' ) {
			get_sidebar();
		}
	}
}


//----------------------------------------------------------------------------------
//	Select a Sidebar
//----------------------------------------------------------------------------------

// Add Selected Sidebar To Specific Pages
function thinkup_input_sidebars() {
global $thinkup_general_sidebars;
global $thinkup_homepage_sidebars;
global $thinkup_blog_sidebars;
global $thinkup_post_sidebars;
global $thinkup_portfolio_sidebars;
global $thinkup_project_sidebars;

global $post;
$_thinkup_meta_layout = get_post_meta( $post->ID, '_thinkup_meta_layout', true );
$_thinkup_meta_sidebars = get_post_meta( $post->ID, '_thinkup_meta_sidebars', true );

	if ( is_front_page() ) {	
			$output = $thinkup_homepage_sidebars;
	} else if ( is_page() and ! is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
				$output = $thinkup_general_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}
	} else if ( is_page_template( 'template-blog.php' ) ) {
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
				$output = $thinkup_blog_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}	
	} else if ( thinkup_check_isblog() and ! is_single() and ! is_post_type_archive( 'portfolio' ) ) {
		$output = $thinkup_blog_sidebars;
	} else if ( is_post_type_archive( 'portfolio' ) ) {	
		$output = $thinkup_portfolio_sidebars;
	} else if ( is_single() and ! is_singular( 'portfolio' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
			$output = $thinkup_post_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}
	} else if ( is_singular( 'portfolio' ) ) {	
		if ( empty( $_thinkup_meta_layout ) or $_thinkup_meta_layout == 'option1' or $_thinkup_meta_sidebars == 'Select a sidebar:' ) {
			$output = $thinkup_project_sidebars;
		} else {
			$output = $_thinkup_meta_sidebars;
		}
	} else if ( is_search() ) {	
		$output = $thinkup_general_sidebars;
	} else {
		$output = $_thinkup_meta_sidebars;
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
global $thinkup_general_breadcrumbswitch;

global $post;
$_thinkup_meta_breadcrumbs = get_post_meta( $post->ID, '_thinkup_meta_breadcrumbs', true );

	if( ! is_front_page() ) {
		if ( empty( $_thinkup_meta_breadcrumbs ) or $_thinkup_meta_breadcrumbs == 'option1' ) {
			if ( $thinkup_general_breadcrumbswitch == '0' or empty( $thinkup_general_breadcrumbswitch ) ) {
				echo '';
			} else if ( $thinkup_general_breadcrumbswitch == '1' ) {
				thinkup_input_breadcrumb();
			}
		} else if ( $_thinkup_meta_breadcrumbs == 'option2' ) {
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
		 '<select onchange="location = this.options[this.selectedIndex].value;"><option value="#">' . __( 'Navigation', 'lan-thinkupthemes') . '</option>' . $output . '</select>',
		 '</div>';
}

function thinkup_input_responsivehtml() {
global $thinkup_general_fixedlayoutswitch;

	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {
		
		$args = array(
			'theme_location' => 'header_menu',
			'items_wrap'     => '<select onchange="location = this.options[this.selectedIndex].value;"><option value="#">' . __( 'Navigation', 'lan-thinkupthemes') . '</option>%3$s</select>',
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
global $thinkup_general_fixedlayoutswitch;
	
	if ( $thinkup_general_fixedlayoutswitch !== '1' ) {
		wp_enqueue_style ( 'thinkup-responsive' );
	}
}
add_action( 'wp_enqueue_scripts', 'thinkup_input_responsivecss', '12' );

function thinkup_input_responsiveclass($classes){
global $thinkup_general_fixedlayoutswitch;

	if ( $thinkup_general_fixedlayoutswitch == '1' ) {
		$classes[] = 'layout-fixed';
	} else {
		$classes[] = 'layout-responsive';	
	}
	return $classes;
}
add_action( 'body_class', 'thinkup_input_responsiveclass');


//----------------------------------------------------------------------------------
//	Custom CSS
//----------------------------------------------------------------------------------

// Add Custom CSS
function thinkup_custom_css() {
global $thinkup_general_customcss;

	if ( ! empty( $thinkup_general_customcss ) ) {
		echo 	"\n" .'<style type="text/css">' . "\n",
				wp_kses_post( $thinkup_general_customcss ) . "\n",
				'</style>' . "\n";
	}
}
add_action( 'wp_head','thinkup_custom_css', '12' );


//----------------------------------------------------------------------------------
//	Custom JavaScript - Front End
//----------------------------------------------------------------------------------

// Add Custom Front-End Javascript
function thinkup_custom_javafront() {
global $thinkup_general_customjavafront;

global $post;
$_thinkup_meta_customjava = get_post_meta( $post->ID, '_thinkup_meta_customjava', true );

	if ( ! empty( $thinkup_general_customjavafront ) ) {
	echo 	'<script type="text/javascript">',
			"\n" . wp_kses_post( $thinkup_general_customjavafront ) . "\n",
			'</script>' . "\n";
	}
	if ( ! empty( $_thinkup_meta_customjava ) ) {
	echo 	'<script type="text/javascript">',
			"\n" . wp_kses_post( $_thinkup_meta_customjava ) . "\n",
			'</script>' . "\n";
	}
}
//add_action( 'wp_footer', 'thinkup_custom_javafront' );


?>