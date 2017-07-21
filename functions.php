<?php

/* 
** Sets up theme defaults and registers support for various WordPress features
*/
function ashe_setup() {
	// Make theme available for translation
	load_theme_textdomain( 'ashe' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title for us
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages
	add_theme_support( 'post-thumbnails' );

	// Set the default content width.
	$GLOBALS['content_width'] = 960;

	// This theme uses wp_nav_menu() in two locations
	register_nav_menus( array(
		'top'	=> __( 'Top Menu', 'ashe' ),
		'main' 	=> __( 'Main Menu', 'ashe' ),
	) );

	// Switch default core markup for search form, comment form, and comments to output valid HTML5
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
add_action( 'after_setup_theme', 'ashe_setup' );


/*
** Enqueue scripts and styles
*/
function ashe_scripts() {

	// Theme Stylesheet
	wp_enqueue_style( 'ashe-style', get_stylesheet_uri() );

	// Theme Print Style
	wp_enqueue_style( 'ashe-print-style', get_theme_file_uri( '/print.css' ) );

	// Theme Responsive CSS
	wp_enqueue_style( 'ashe-responsive', get_theme_file_uri( '/assets/css/responsive.css' ) );

	// FontAwesome Icons
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/font-awesome.min.css' ) );

	// Fontello Icons
	wp_enqueue_style( 'fontello', get_theme_file_uri( '/assets/css/fontello.css' ) );

	// Slick Slider
	wp_enqueue_style( 'slick', get_theme_file_uri( '/assets/css/slick.css' ) );

	// Scrollbar
	wp_enqueue_style( 'scrollbar', get_theme_file_uri( '/assets/css/perfect-scrollbar.css' ) );


	// Enqueue Custom Scripts
	wp_enqueue_script( 'ashe-plugins', get_theme_file_uri( '/assets/js/custom-plugins.min.js' ), array( 'jquery' ), false, true );
	wp_enqueue_script( 'ashe-custom-scripts', get_theme_file_uri( '/assets/js/custom-scripts.js' ), array( 'jquery' ), false, true );

	// Comment reply link
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'ashe_scripts' );


/*
** Enqueue Google Fonts
*/
function ashe_playfair_font_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'ashe' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Playfair Display:400,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

function ashe_opensans_font_url() {
    $font_url = '';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'ashe' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Open Sans:400italic,400,600italic,600,700italic,700' ), "//fonts.googleapis.com/css" );
    }
    return $font_url;
}

function ashe_gfonts_scripts() {
    wp_enqueue_style( 'ashe-playfair-font', ashe_playfair_font_url(), array(), '1.0.0' );
    wp_enqueue_style( 'ashe-opensans-font', ashe_opensans_font_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'ashe_gfonts_scripts' );


/*
** Register widget areas.
*/
function ashe_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Left', 'ashe' ),
		'id'            => 'sidebar-left',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'ashe' ),
		'before_widget' => '<div id="%1$s" class="ashe-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Right', 'ashe' ),
		'id'            => 'sidebar-right',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'ashe' ),
		'before_widget' => '<div id="%1$s" class="ashe-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar Alt', 'ashe' ),
		'id'            => 'sidebar-alt',
		'description'   => __( 'Add widgets here to appear in your alternative/fixed sidebar.', 'ashe' ),
		'before_widget' => '<div id="%1$s" class="ashe-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widgets', 'ashe' ),
		'id'            => 'footer-widgets',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ashe' ),
		'before_widget' => '<div id="%1$s" class="ashe-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-title"><h2>',
		'after_title'   => '</h2></div>',
	) );

}
add_action( 'widgets_init', 'ashe_widgets_init' );

/*
** Custom Image Sizes
*/
add_image_size( 'ashe-slider-full-thumbnail', 1080, 540, true );
add_image_size( 'ashe-full-thumbnail', 1140, 0, true );
add_image_size( 'ashe-grid-thumbnail', 500, 330, true );
add_image_size( 'ashe-single-navigation', 75, 75, true );

/*
**  Top Menu Fallback
*/

function top_menu_fallback() {
	echo '<ul id="top-menu">';
		echo '<li>';
			echo '<a href="'. esc_url( home_url('/') .'wp-admin/nav-menus.php' ) .'">'. esc_html__( 'Set up Menu', 'ashe' ) .'</a>';
		echo '</li>';
	echo '</ul>';
}

/*
**  Main Menu Fallback
*/

function main_menu_fallback() {
	echo '<ul id="main-menu">';
		echo '<li>';
			echo '<a href="'. esc_url( home_url('/') .'wp-admin/nav-menus.php' ) .'">'. esc_html__( 'Set up Menu', 'ashe' ) .'</a>';
		echo '</li>';
	echo '</ul>';
}

/*
**  Custom Excerpt Length
*/

function ashe_excerpt_length() {	
	return 2000;
}
add_filter( 'excerpt_length', 'ashe_excerpt_length', 999 );

function ashe_new_excerpt( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'ashe_new_excerpt' );

if ( ! function_exists( 'ashe_excerpt' ) ) {

	function ashe_excerpt( $limit = 50 ) {
	    echo '<p>'.wp_trim_words(get_the_excerpt(), $limit).'</p>';
	}

}

/*
** Custom Functions
*/

// Page Layouts
function ashe_page_layout() {
	// get layout
 	if ( is_active_sidebar( 'sidebar-right' ) && is_active_sidebar( 'sidebar-left' ) ) {
		return 'col1-lrsidebar';
	}  elseif ( is_active_sidebar( 'sidebar-right' ) ) {
		return 'col1-rsidebar';
	} elseif ( is_active_sidebar( 'sidebar-left' ) ) {
		return 'col1-lsidebar';
	} 
}

// HEX to RGBA Converter
function ashe_hex2rgba( $color, $opacity = 1 ) {

	// remove '#' from string
	$color = substr( $color, 1 );

	// get values from string
	$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );

    // convert HEX to RGB
    $rgb = array_map( 'hexdec', $hex );

    // convert HEX to RGBA
	$output = 'rgba('. implode( ",", $rgb ) .', '. $opacity .')';

    return $output;
}


// Social Media
if ( ! function_exists( 'ashe_social_media' ) ) {

	function ashe_social_media( $social_class='' ) {

	?>

		<div class="<?php echo esc_attr( $social_class ); ?>">

			<?php
			$social_window = ( ashe_options( 'social_media_window' ) === true )?'_blank':'_self';
			if ( ashe_options( 'social_media_url_1' ) !== '' ) :
			?>

			<a href="<?php echo esc_url( ashe_options( 'social_media_url_1' ) ); ?>" target="<?php echo esc_attr($social_window); ?>">
				<i class="fa fa-<?php echo ashe_options( 'social_media_icon_1' ); ?>"></i>
			</a>
			<?php endif; ?>

			<?php if ( ashe_options( 'social_media_url_2' ) !== '' ) : ?>
				<a href="<?php echo esc_url( ashe_options( 'social_media_url_2' ) ); ?>" target="<?php echo esc_attr($social_window); ?>">
					<i class="fa fa-<?php echo ashe_options( 'social_media_icon_2' ); ?>"></i>
				</a>
			<?php endif; ?>

			<?php if ( ashe_options( 'social_media_url_3' ) !== '' ) : ?>
				<a href="<?php echo esc_url( ashe_options( 'social_media_url_3' ) ); ?>" target="<?php echo esc_attr($social_window); ?>">
					<i class="fa fa-<?php echo ashe_options( 'social_media_icon_3' ); ?>"></i>
				</a>
			<?php endif; ?>

			<?php if ( ashe_options( 'social_media_url_4' ) !== '' ) : ?>
				<a href="<?php echo esc_url( ashe_options( 'social_media_url_4' ) ); ?>" target="<?php echo esc_attr($social_window); ?>">
					<i class="fa fa-<?php echo ashe_options( 'social_media_icon_4' ); ?>"></i>
				</a>
			<?php endif; ?>

		</div>

	<?php

	} // ashe_social_media()

} // function_exists( 'ashe_social_media' )


// Related Posts
if ( ! function_exists( 'ashe_related_posts' ) ) {
	
	function ashe_related_posts( $title, $orderby ) {

		global $post;
		$current_categories	= get_the_category();

		if ( $current_categories ) {

			$first_category	= $current_categories[0]->term_id;

			// Random
			if ( $orderby === 'random' ) {
				$args = array(
					'post_type'				=> 'post',
					'post__not_in'			=> array( $post->ID ),
					'orderby'				=> 'rand',
					'posts_per_page'		=> 3,
					'ignore_sticky_posts'	=> 1,
				    'meta_query' => array(
				        array(
				         'key' => '_thumbnail_id',
				         'compare' => 'EXISTS'
				        ),
				    )
				);

			// Similar
			} else {
				$args = array(
					'post_type'				=> 'post',
					'category__in'			=> array( $first_category ),
					'post__not_in'			=> array( $post->ID ),
					'orderby'				=> 'rand',
					'posts_per_page'		=> 3,
					'ignore_sticky_posts'	=> 1,
				    'meta_query' => array(
				        array(
				         'key' => '_thumbnail_id',
				         'compare' => 'EXISTS'
				        ),
				    )
				);
			}

			$similar_posts = new WP_Query( $args );	

			if ( $similar_posts->have_posts() ) {

			?>

			<div class="related-posts">
				<h3><?php echo esc_html( $title ); ?></h3>

				<?php 

				while ( $similar_posts->have_posts() ) { 
					$similar_posts->the_post();
					if ( has_post_thumbnail() ) {
				?>
					<section>
						<a href="<?php esc_url( the_permalink() ); ?>"><?php the_post_thumbnail('ashe-grid-thumbnail'); ?></a>
						<h4><a href="<?php esc_url( the_permalink() ); ?>"><?php the_title(); ?></a></h4>
						<span class="related-post-date"><?php echo get_the_time( get_option('date_format') ); ?></span>
					</section>

				<?php

					} // end if
				} // end while

				?>

				<div class="clear-fix"></div>
			</div>

			<?php

			} // end have_posts()

		} // if ( $current_categories )

		wp_reset_postdata();

	} // ashe_related_posts()
} // function_exists( 'ashe_related_posts' )


/*
** Custom Search Form
*/
function ashe_custom_search_form( $html ) {

	$html  = '<form role="search" method="get" id="searchform" class="clear-fix" action="'. esc_url( home_url( '/' ) ) .'">';
	$html .= '<input type="search" name="s" id="s" placeholder="'. esc_attr__( 'Search', 'ashe' ) .'" data-placeholder="'. esc_attr__( 'Type and hit enter...', 'ashe' ) .'" value="'. get_search_query() .'" />';
	$html .= '<i class="fa fa-search"></i>';
	$html .= '<input type="submit" id="searchsubmit" value="st" />';
	$html .= '</form>';

	return $html;
}
add_filter( 'get_search_form', 'ashe_custom_search_form' );


/*
** Comments Form Section
*/

if ( ! function_exists( 'ashe_comments' ) ) {

	function ashe_comments ( $comment, $args, $depth ) {
		$_GLOBAL['comment'] = $comment;

		if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback' ) : ?>
			
		<li class="pingback" id="comment-<?php comment_ID(); ?>">
			<article <?php comment_class('entry-comments'); ?> >
				<div class="comment-content">
					<h3 class="comment-author"><?php esc_html_e( 'Pingback:', 'ashe' ); ?></h3>	
					<div class="comment-meta">		
						<a class="comment-date" href=" <?php echo esc_url( get_comment_link() ); ?> "><?php comment_date( get_option('date_format') ); esc_html_e( '&nbsp;at&nbsp;', 'ashe' ); comment_time( get_option('time_format') ); ?></a>
						<?php echo edit_comment_link( esc_html__('[Edit]', 'ashe' ) ); ?>
						<div class="clear-fix"></div>
					</div>
					<div class="comment-text">			
					<?php comment_author_link(); ?>
					</div>
				</div>
			</article>

		<?php elseif ( get_comment_type() == 'comment' ) : ?>

		<li id="comment-<?php comment_ID(); ?>">
			
			<article <?php comment_class( 'entry-comments' ); ?> >					
				<div class="comment-avatar">
					<?php echo get_avatar( $comment, 75 ); ?>
				</div>
				<div class="comment-content">
					<h3 class="comment-author"><?php comment_author_link(); ?></h3>
					<div class="comment-meta">		
						<a class="comment-date" href=" <?php echo esc_url( get_comment_link() ); ?> "><?php comment_date( get_option('date_format') ); esc_html_e( '&nbsp;at&nbsp;', 'ashe' ); comment_time( get_option('time_format') ); ?></a>
			
						<?php 
						echo edit_comment_link( esc_html__('[Edit]', 'ashe' ) );
						comment_reply_link(array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth']) ) );
						?>
						
						<div class="clear-fix"></div>
					</div>

					<div class="comment-text">
						<?php if ( $comment->comment_approved == '0' ) : ?>
						<p class="awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'ashe' ); ?></p>
						<?php endif; ?>
						<?php comment_text(); ?>
					</div>
				</div>
				
			</article>

		<?php endif;
	}
}

// Move Comments Textarea
function ashe_move_comments_field( $fields ) {

	// unset/set
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;

	return $fields;
}

add_filter( 'comment_form_fields', 'ashe_move_comments_field' );


/*
** Incs: Theme Customizer
*/

// Customizer
require get_parent_theme_file_path( '/inc/customizer/customizer.php' );
require get_parent_theme_file_path( '/inc/customizer/customizer-defaults.php' );
require get_parent_theme_file_path( '/inc/customizer/dynamic-css.php' );