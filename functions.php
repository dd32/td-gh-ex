<?php 

function add_theme_scripts() {
 

  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap.min.css', array(), '4.1.3', 'all');
 
}



add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
function add_theme_scripts_footer() { 

  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_script( 'popper-min', get_template_directory_uri() . '/popper.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/bootstrap.min.js', array(), '1.0.0', true );
}
add_action( 'wp_footer', 'add_theme_scripts_footer' );
function register_menu_home() {
  register_nav_menus(
    array(
      'header-home-menu' => __( 'Header Home Menu', 'apelleuno' ),
      'central-home-menu' => __( 'Home Menu', 'apelleuno' ),
	  'top-primary' => __( 'Primary Menu', 'apelleuno' ),
     )
   );
 }
 add_action( 'init', 'register_menu_home' );
 
 function add_link_atts($atts,$item, $args ) {
	 if( isset($args->theme_location) and $args->theme_location == 'header-home-menu' ) {
		 
		  $atts['class'] = "nav-link";
		 
	 }
	 if( isset($args->theme_location) and $args->theme_location == 'central-home-menu' ) {
		  $atts['class'] = "c-content-nav__link js-contentNavListItem";
		 
	 }
	 if( isset($args->theme_location) and $args->theme_location == 'top-primary' ) {
		  $atts['class'] = "nav-link ";
		 
	 }
	  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_link_atts', 10, 3);

// Add CSS class to children menu item on WordPress
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

    foreach ( $items as $item ) {
        if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
            $item->classes[] = 'dropdown-item';
        }
    }

    return $items;
}
add_filter( 'nav_menu_link_attributes', 'add_class_to_items_link', 10, 3 );

function add_class_to_items_link( $atts, $item, $args ) {
  // check if the item has children
  $hasChildren=0;
  if(isset($item->classes) and is_array($item->classes))
  	$hasChildren = (in_array('menu-item-has-children', $item->classes));
  if ($hasChildren) {
    // add the desired attributes:
    $atts['class'] = 'nav-link dropdown-toggle';
    $atts['data-toggle'] = 'dropdown';
    $atts['data-target'] = '#';
  }
  return $atts;
}
class Apelle_Walker_Nav_Menu_primary extends Walker_Nav_Menu {
	
	function start_lvl(&$output, $depth=0, $args = array()) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu multi-level \" >\n";
  }
   
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

      
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
		
		if(isset($args->walker) and $args->walker->has_children and isset($item->menu_item_parent) and $item->menu_item_parent != 0 )
        {		
        	$output .= $indent . '<li class="nav-item dropdown-submenu">';
		}else
		{
				$output .= $indent . '<li class="nav-item">';
			}

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
 	
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

      
        $title = apply_filters( 'the_title', $item->title, $item->ID );

      
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
	    $item_output = '';
		if(isset($args->before))
        	$item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
		if(isset($args->link_before))
        	$item_output .= $args->link_before ;
		$item_output .= $title ;
		if(isset($args->link_after)) $args->link_after;
        	$item_output .= '</a>';
		if(isset($args->after))
       	 $item_output .= $args->after;

       
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

class Apelle_Walker_Nav_Menu extends Walker_Nav_Menu {
	
	function start_lvl(&$output, $depth=0,$args = array() ) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu bg-dark \" >\n";
  }
   
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

      
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

       // $output .= $indent . '<li class="nav-item">';
		if($args->walker->has_children and $item->menu_item_parent != 0 )
        {		
        	$output .= $indent . '<li class="nav-item dropdown-submenu">';
		}else
		{
				$output .= $indent . '<li class="nav-item">';
			}

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
 	
        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

      
        $title = apply_filters( 'the_title', $item->title, $item->ID );

      
        $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

       
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

function add_description_to_menu($item_output, $item, $depth, $args) {
	 if( isset($args->theme_location) and  $args->theme_location == 'central-home-menu' ) {
		if (strlen($item->description) > 0 ) {
				  
			$item_output = substr($item_output, 0, -strlen("</a>{$args->after}")) . sprintf('<span class="c-content-nav__subtext">%s</span >', esc_html($item->description)) . "</a>{$args->after}";
		}
	 }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_description_to_menu', 10, 4);


add_action( 'after_setup_theme', 'wpse_theme_setup' );
function wpse_theme_setup() {
   
    add_theme_support( 'title-tag' );
}

add_theme_support( 'custom-logo' );
function apelleuno_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
   add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'apelleuno_logo_setup' );
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
add_theme_support( 'automatic-feed-links' );
add_action( 'widgets_init', 'apelleuno_widgets_init' );
function apelleuno_widgets_init() {
$args = array(
	'name'          => __( 'Barra Laterale', 'apelleuno' ),
	'id'            => 'apelleuno-sidebar-laterale',    
	'description'   => __( 'i widgets in quest\'area verranno mostrati nella Barra Laterale in tutte le pagine.', 'apelleuno' ),
        'class'         => '',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' ); 
register_sidebar( $args );

$args = array(
	'name'          => __( 'Footer 1', 'apelleuno' ),
	'id'            => 'apelleuno-footer-1',    
	'description'   => __( 'i widgets in quest\'area verranno mostrati nella prima area footer in tutte le pagine.', 'apelleuno' ),
        'class'         => 'list-unstyled text-small',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h5 class="widgettitle">',
	'after_title'   => '</h5>' ); 
register_sidebar( $args );

$args = array(
	'name'          => __( 'Footer 2', 'apelleuno' ),
	'id'            => 'apelleuno-footer-2',    
	'description'   => __( 'i widgets in quest\'area verranno mostrati nella prima area footer in tutte le pagine.', 'apelleuno' ),
        'class'         => 'list-unstyled text-small',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h5 class="widgettitle">',
	'after_title'   => '</h5>' ); 
register_sidebar( $args );

$args = array(
	'name'          => __( 'Footer 3', 'apelleuno' ),
	'id'            => 'apelleuno-footer-3',    
	'description'   => __( 'i widgets in quest\'area verranno mostrati nella prima area footer in tutte le pagine.', 'apelleuno' ),
        'class'         => 'list-unstyled text-small',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h5 class="widgettitle">',
	'after_title'   => '</h5>' ); 
register_sidebar( $args );
}
add_theme_support( 'post-thumbnails' ); 
?>