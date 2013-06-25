<?php
add_action( 'after_setup_theme', 'star_setup' );
function star_setup() {
	/* width     bredd */
	if ( ! isset( $content_width ) ) $content_width = 400;

	$star_ch = array( //custom header settings
	'default-image'          => get_template_directory_uri() . '/images/star-header.png',
	'random-default'         => false,
	'width'                  => 1600,
	'height'                 => 380,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'header-text'            => false
	);
	add_theme_support( 'custom-header', $star_ch );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	
	/* translate */
	load_theme_textdomain( 'star', get_template_directory() . '/languages' );
	
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'star' ),
		'footer' => __( 'Footer Navigation', 'star' ),
	) );
}

/*switch on jquery to make the slider work          starta jquery till slidern...*/
/* add slider javascript              ladda javascripten till slidern*/

function star_enqueue_scripts() {
    wp_enqueue_script('jquery');
	if ( !is_admin() ){
		wp_register_script('custom_script', get_template_directory_uri() . '/scripts/jquery.cycle.all.js');
		wp_enqueue_script('custom_script');
	}
}
add_action('wp_enqueue_scripts', 'star_enqueue_scripts');



/* add 'home' button to menu            'hem' knapp i menyn*/
function star_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
add_filter( 'wp_page_menu_args', 'star_page_menu_args' );

 function star_fonts() {
	if ( !is_admin() ) {
            wp_register_style('star_Font','http://fonts.googleapis.com/css?family=Arvo');
			wp_enqueue_style('star_Font2');
	}
}
 add_action('wp_print_styles', 'star_fonts');	

/*Headers    Sidhuvud*/

register_default_headers( array(
	'light-blue' => array(
		'url' => '%s/images/star-header-light-blue.png',
		'thumbnail_url' => '%s/images/star-header-light-blue-thumb.png',
		/* translators: header image description */
		'description' => __( 'Light Blue', 'star' )
	),
	'light-beige' => array(
		'url' => '%s/images/star-header-light-beige.png',
		'thumbnail_url' => '%s/images/star-header-light-beige-thumb.png',
		/* translators: header image description */
		'description' => __( 'Light Beige', 'star' )
	),
	'black' => array(
		'url' => '%s/images/star-header-black.png',
		'thumbnail_url' => '%s/images/star-header-black-thumb.png',
		/* translators: header image description */
		'description' => __( 'Black', 'star' )
	),
	'blue' => array(
		'url' => '%s/images/star-header.png',
		'thumbnail_url' => '%s/images/star-header-thumb.png',
		/* translators: header image description */
		'description' => __( 'Blue', 'star' )
	)
) );
	
/* Post excerpt        utdrag*/
function star_excerpt_length( $length ) {
	return 120;
}
add_filter( 'excerpt_length', 'star_excerpt_length' );


/* "Continue Reading"      Byt ut [...]*/
function star_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading.', 'star' ) . '</a>';
}

function star_auto_excerpt_more( $more ) {
	return ' &hellip;' . star_continue_reading_link();
}
add_filter( 'excerpt_more', 'star_auto_excerpt_more' );

function star_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= star_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'star_custom_excerpt_more' );


/* Comments        Kommentarerna */
if ( ! function_exists( 'star_comment' ) ) :
	function star_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		switch ( $comment->comment_type ) :
			case '' :
		?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
		<?php 
			if ($comment->comment_parent) {
				$parent_comment = get_comment($comment->comment_parent);
			echo '<cite class="fn">' .get_comment_author_link() .'</cite>';
		 
			printf( __(' in reply to <i>%1$s</i> on %2$s at %3$s:','star' ), $parent_comment->comment_author, get_comment_date(__('F j, Y','star')), get_comment_time(__('g:i A','star')) ); 
			}
			else {
			printf( __('<cite class="fn">%s</cite>','star'), get_comment_author_link() ); 
				/* translators: 1: date, 2: time */
				printf( __( ' on %1$s at %2$s:', 'star' ), get_comment_date(__('F j, Y','star')),  get_comment_time(__('g:i A','star')) ); 
			}
			?>
			</div>
			<div class="comment-body">
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em><?php _e( 'Your comment is awaiting moderation.', 'star' ); ?></em><br/>
			<?php endif; ?>
			<?php comment_text(); 
			edit_comment_link( __( '(Edit)', 'star' ), ' ' );
			?>
			</div>
			<?php echo get_avatar( $comment, 50 ); ?>
			<div class="comment-bottom"> </div>
			<div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div><!-- .reply -->
		</div>
	<?php
		break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="pingback">
	<p><?php comment_author_link(); ?>   <?php edit_comment_link( __('(Edit)', 'star'), ' ' ); ?></p>
	<?php
	break;
	endswitch;
}
endif;



/* Register widget areas (Sidebars)        Skapa sidebars*/
register_sidebar(array('name'=>'Right_Widgetarea'));

/* Slider */
/* Create a new post type for the frontpage slider         Nytt postformat till slidern*/
function star_post_type_slider() {
    register_post_type( 'slider',
	array( 'label' => __('Slider','star'),
	'public' => true, 
	'show_ui' => true, 
    'menu_position' => 5,
	'rewrite' => array( 'slug' => 'slider','with_front' => FALSE),
	'exclude_from_search' => false,
	'query_var' => true,
	'capability_type' => 'post',
	'taxonomy' => array('post_tag', 'category'),
	'supports' => array('title', 'editor', 'comments', 'thumbnail', 'author', 'excerpt' ),
	));    
	register_taxonomy_for_object_type('post_tag', 'slider');
	register_taxonomy_for_object_type('category', 'slider');
}

add_action('init', 'star_post_type_slider',0);

/*Add post type 'slider' to the query*/
function star_pre_get_posts_filter( $query ) {
   global $wp_query;
  if ( !is_preview() && !is_admin() && !is_singular() && !is_404() ) {
     if ($query->is_feed) {
     } else {
       $my_post_type = get_query_var( 'post_type' );
       if ( empty( $my_post_type ) )
         $query->set( 'post_type' , array( 'post', 'slider' ) );
     }
   }
  return $query;
 }
 add_filter( 'pre_get_posts' , 'star_pre_get_posts_filter' ); 

/* Custom Recent Posts widget that includes slider posts */
function star_recent_posts() {
	$r = new WP_Query(array('post_type' => (array('slider','post')), /*adds both slider and post       visa poster och sliders*/
	'showposts' => 5, /*The number of posts to show            antal som ska visas*/
	'nopaging' => 0, 
	'post_status' => 'publish', 
	'ignore_sticky_posts' => 1));
	if ($r->have_posts()) :
		?>
			<?php  while ($r->have_posts()) : $r->the_post(); ?>
				<li><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></li>
			<?php endwhile; ?>
		<?php
		wp_reset_postdata();
	endif;
}
function star_widget_recent_posts_init() {
	if (!function_exists('register_sidebar_widget')) {
		return;
	}

function star_widget_recent_posts() {
	echo '<li class="widget widget_recent_posts">';
	echo '<h2>';
	echo __('Recent Posts','star'); /* Widget Title */
	echo '</h2>';
	echo '<ul class="star-posts">';
			star_recent_posts();
	echo '</ul>';
	echo '</li>';
	}
	wp_register_sidebar_widget('id_star_posts','Recent Posts' , 'star_widget_recent_posts');
}
star_widget_recent_posts_init();

add_action('widgets_init', 'star_remove_widget');
function star_remove_widget(){
	unregister_widget('WP_Widget_Recent_Posts' ); /*remove the standard widget           tabort den gamla widgeten*/
	}
?>