<?php
/*
# ====================================
# functions.php
#
# Akyl function and definitions
# ====================================
*/

/* ------------------------------------
/* 1. CONSTANTS
/* ------------------------------------ */
define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/assets/images' );
define( 'JS', THEMEROOT . '/assets/js' );


/* ------------------------------------
/* 2. THEME SETUP
/*------------------------------------ */
if ( ! function_exists('akyl_theme_setup') ) {
	function akyl_theme_setup() {
		/* Make the theme available for translation. */
		$lang_dir = THEMEROOT . '/languages';
		load_theme_textdomain( 'akyl', get_template_directory() . '/languages' );

		/* Add support for automatic feed links. */
		add_theme_support( 'automatic-feed-links' );

		/* Add support for post thumbnails. */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'akyl-thumbnail', 720, 999);

		/* Add Post formats */
		add_theme_support( 'post-formats', array( 'audio', 'gallery', 'image', 'link', 'quote', 'video' ) );

		/* Add support for title_tag */
		add_theme_support('title-tag');

		/* Register nav menus */
		register_nav_menus( array( 
			'main-menu' => __( 'Main menu', 'akyl' )
		) );
	}
	add_action( 'after_setup_theme', 'akyl_theme_setup' );
}


/**
 * Modify default menu
 */
function akyl_modify_default_menu( $ulclass ) {
  return preg_replace( '/<ul>/', '<ul class="nav navbar-nav nav-menu">', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'akyl_modify_default_menu' );


/* ------------------------------------
/* 3. WIDGET AREA
/*------------------------------------ */
function akyl_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'akyl' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'akyl' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'akyl' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'akyl' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'akyl' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'akyl' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'akyl_widgets_init' );


/* ------------------------------------
/* 4. GET POST META
/*------------------------------------ */
if ( ! function_exists('akyl_post_meta') ) {
	function akyl_post_meta( $type = 'tags', $id = '' ) {
		/* post date */
 		if ( $type == 'date' ) {
 			echo '<a href="' . get_the_permalink() . '" rel="bookmark" >';
 			echo '<span id="time"><i class="fa  fa-clock-o"></i> ' . get_the_date() . '</span>';
 			echo '</a>';
 		}

 		/* number of post comments */
 		elseif ( $type == 'comment' ) {
 			echo '<a href="' . get_the_permalink() . '#comments"  rel="bookmark" >';
 			echo '<span class="comment-count">' . get_comments_number() . ' <i class="fa fa-comment-o"></i></span>';
 			echo '</a>';
 		}

 		/* categories */
 		elseif ( $type == 'category' ) {
 			if ( has_category() ) {
 				echo '<span><i class="fa fa-folder-open"></i> ';
 				the_category( ' / ' );
 				echo '</span>';
 			}
 		}

 		/* tags */
 		elseif ( $type == 'tags' ) {
 			if ( has_tag() ) {
 				echo '<span><i class="fa fa-tags"></i> ';
 				the_tags( '', ' / ' );
 				echo '</span>';
 			}
 		}

 		/* author name */
 		elseif ( $type == 'author_name' ) {
 			the_author();
 		}

 		/* author bio */
 		elseif ( $type == 'author_bio' ) {
 			the_author_meta( 'description' );
 		}

 		/* author avatar */
 		elseif ( $type == 'user_avatar' ) {
 			if ( $id == '' ) $id = get_the_author_meta( 'ID' );
 			echo get_avatar( $id, '', '', '', array( 'class' => 'img-responsive' ) );
 		}
	}
}


/* ------------------------------------
/* 5. ENQUEUE SCRIPTS AND STYLES
/*------------------------------------ */
if ( ! function_exists('akyl_scripts') ) {
	function akyl_scripts() {
		/* Bootstrap CSS */
		wp_enqueue_style( 'akyl-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );
		/* Flexslider CSS */
		wp_enqueue_style( 'akyl-flexslider-style', get_template_directory_uri() . '/assets/css/flexslider.css' );
		/* Template's Primary CSS */
		wp_enqueue_style( 'akyl-style', get_stylesheet_uri() );
		/* Google fonts */
		wp_enqueue_style( 'akyl-googleFonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Raleway:300,400,500,700' );
		/* Font Awesome CSS */
		wp_enqueue_style( 'akyl-iconfonts', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );

		/* Conditional Resources for IE 9 */
		wp_enqueue_script( 'akyl-html5', get_template_directory_uri() . '/assets/js/html5shiv.js' , array(), '3.7.0' );
		wp_script_add_data( 'akyl-html5', 'conditional', 'lt IE 9' );
		wp_enqueue_script( 'akyl-respondjs', get_template_directory_uri() . '/assets/js/respond.min.js' , array(), '1.4.2' );
		wp_script_add_data( 'akyl-respondjs', 'conditional', 'lt IE 9' );

		/* jquery */
		wp_enqueue_script( 'jquery' );
		/* Bootsrap Core JS */
		wp_enqueue_script( 'akyl-bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.min.js' , array('jquery'), null, true);
		/* Flexslider JS */
		wp_enqueue_script( 'akyl-flexslider-js', get_template_directory_uri() . '/assets/js/flexslider.min.js', array('jquery'), '', true );
		/* Masonry JS */
		wp_enqueue_script( 'masonry' );
		/* Template Coere JS */
		wp_enqueue_script( 'akyl-script', get_template_directory_uri() . '/assets/js/script.js' , array('jquery'), null, true);

		/* comment js only if needed */
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'akyl_scripts' );
}


/* ------------------------------------
/* 6. Social Links
/*------------------------------------ */
function load_social_links( $ele = '' ) {
	$facebook 	= get_option( 'facebook' );
	$twitter 	= get_option( 'twitter' );
	$gplus 		= get_option( 'google-plus' );
	$dribbble 	= get_option( 'dribbble' );
	$instagram 	= get_option( 'instagram' );

	$links[] = '';

	if ( $facebook != '' ) {
		$links[] = '<a href="' . $facebook . '"><i class="fa fa-facebook"></i></a>';
	}

	if ( $twitter != '' ) {
		$links[] = '<a href="' . $twitter . '"><i class="fa fa-twitter"></i></a>';
	}

	if ( $gplus != '' ) {
		$links[] = '<a href="' . $gplus . '"><i class="fa fa-google-plus"></i></a>';
	}

	if ( $dribbble != '' ) {
		$links[] = '<a href="' . $dribbble . '"><i class="fa fa-dribbble"></i></a>';
	}

	if ( $instagram != '' ) {
		$links[] = '<a href="' . $instagram . '"><i class="fa fa-instagram"></i></a>';
	}

	return $links;
}


/**
 * return first url from a post
 * @return string URL
 */
function akyl_get_link_url() {
	$content = get_the_content();
	$has_url = get_url_in_content( $content );

	return ( $has_url && has_post_format( 'link' ) ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

// Change the length of excerpts
function akyl_custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'akyl_custom_excerpt_length', 999 );

// Add more-link ( [...] to . . . )
function akyl_excerpt_more( $more ) {
	return '<strong>. . .</strong>';
}
add_filter( 'excerpt_more', 'akyl_excerpt_more' );


// Use full size gallery images for the next gallery shortcode: 
function akyl_shortcode_atts_gallery( $out )
{
    remove_filter( current_filter(), __FUNCTION__ );
    $out['size'] = 'akyl-thumbnail';
    return $out;
}
add_filter( 'shortcode_atts_gallery', 'akyl_shortcode_atts_gallery' );


// Add editor styles
function akyl_add_editor_styles() {
    add_editor_style( 'akyl-editor-style.css' );
    $font_url = 'https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Raleway:300,400,500,700';
    add_editor_style( str_replace( ',', '%2C', $font_url ) );
}
add_action( 'init', 'akyl_add_editor_styles' );


// Set content-width
if ( ! isset( $content_width ) ) $content_width = 640;


// akyl_comment
if ( ! function_exists('akyl_comment') ) {
	function akyl_comment( $comment, $args, $depth ) {
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>" >
		
			<div id="comment-<?php comment_ID(); ?>" >
				
				<div class="comment-avatar">
					
					<?php akyl_post_meta( 'user_avatar', $comment); ?>
					
				</div>
				
				<div class="comment-body">

					<?php printf( '<h5>%1$s</h5>', get_comment_author_link() );  ?>

					<div class="comment-meta">

						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>"><?php echo get_comment_date() . ' at ' . get_comment_time() ?></a>

					</div>

					<div class="comment-content">
						<?php if ( '0' == $comment->comment_approved ) : ?>
						
							<p class="comment-awaiting-moderation" style="color: #59a3e9;"><?php _e( 'Awaiting moderation', 'akyl' ); ?></p>
							
						<?php endif; ?>

						<?php comment_text(); ?>

					</div>

					<div class="comment-actions-below">
						
						<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fa fa-reply"></i> Reply', 'akyl' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
						
						<?php edit_comment_link( __( '<i class="fa fa-pencil"></i> Edit', 'akyl' ), '' ); ?>

						<div class="clear"></div>
					
					</div> <!-- /comment-actions -->
				</div>
				
				<div class="clearfix"></div>
			</div>

		</li>
		<?php
	}
}


// Load customizer
require get_template_directory() . '/inc/customizer.php' ;



/*
* Uncomment following code if needed to remove version number from static files ( css, js)
*/
/*

// Remove WP Version From Styles	
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
*/