<?php
if ( ! function_exists( 'cherish_setup' ) ) {
	function cherish_setup() {
		//custom header settings
		$cherish_ch = array( 
		'default-image'          => get_template_directory_uri() . '/images/cherry3.png',
		'random-default'         => false,
		'width'                  => 1900,
		'height'                 => 660,
		'flex-height'            => true,
		'flex-width'             => true,
		'uploads'                => true,
		'header-text'            => true,
		'default-text-color'     => '000000',
		'wp-head-callback'       => 'cherish_customize_css'
		);
		add_theme_support( 'custom-header', $cherish_ch );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'gallery', 'caption' ) );

		/* translate */
		load_theme_textdomain( 'cherish', get_template_directory() . '/languages' );
		
		/* add menu */
		register_nav_menus( array('header' => __( 'Header Navigation', 'cherish' ) ) );	
		
		add_editor_style();
		
		/* width     bredd */
		global $content_width; 
		if ( ! isset( $content_width ) ) {
			$content_width = 560;
		}
		
		register_default_headers( array(
			'cherry' => array(
				'url' => '%s/images/cherry.png',
				'thumbnail_url' => '%s/images/cherry-thumb.png',
				/* translators: header image description */
				'description' => __( 'Cherry', 'cherish' )
			),
			'cherry2' => array(
				'url' => '%s/images/cherry2.png',
				'thumbnail_url' => '%s/images/cherry2-thumb.png',
				/* translators: header image description */
				'description' => __( 'Cherry 2', 'cherish' )
			),
			'cherry3' => array(
				'url' => '%s/images/cherry3.png',
				'thumbnail_url' => '%s/images/cherry3-thumb.png',
				/* translators: header image description */
				'description' => __( 'Cherry 3', 'cherish' )
			)

		) );
	}
}
add_action( 'after_setup_theme', 'cherish_setup' );

/*
Add support for changing the color of the title and description
Add the chosen header as a background image
Customizer options 
*/
function cherish_customize_css() {
echo '<style type="text/css">
		.site-title a,
		.site-description {
			color: #' . get_header_textcolor() . '}';
		
		if( get_theme_mod( 'cherish_footer_color' ) <> '' ) {
			echo '#footer .site-title a,
			#footer .site-description,
			.footer-credit, 
			.footer-credit a{
				color:' . get_theme_mod( 'cherish_footer_color' )  . '}';
		}
		
		echo '#header{
			background:url(' . get_header_image() . ');
			height:'. get_custom_header()->height . 'px;
			}';
		
		if ( get_theme_mod( 'cherish_hide_action' ) == '' ) {
		
			if( get_theme_mod( 'cherish_action_text' ) <> '') {
				echo '#action{opacity:1;}';
			}
			
			if ( get_theme_mod( 'cherish_action_color' ) <> '') {
				echo '#action, #action a{color:' . get_theme_mod( 'cherish_action_color' ) . ';}';
			}
			if ( get_theme_mod( 'cherish_action_bgcolor' ) <> '' ) {
				echo '#action{background-color:' . get_theme_mod( 'cherish_action_bgcolor' ) . ';}';
			}
			if ( get_theme_mod( 'cherish_action_size' ) <> '' ) {
				echo '#action{font-size:' . get_theme_mod( 'cherish_action_size' ) . 'em;}';
			}
		}
		
		echo 'a:focus, .site-title a:focus, #footer a:focus, #header-menu a:focus{text-decoration:underline;}';

	echo '</style>';
}
add_action( 'wp_head', 'cherish_customize_css');


function cherish_skip(){
?>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	jQuery(document).ready(function($){
		$(".fa-angle-down").click(function(){
			window.scrollTo(0,<?php echo get_custom_header()->height-10?>);
		});
		$(".fa-angle-up").click(function(){
			window.scrollTo(0,0);
		})
	});
	//--><!]]>
	 </script>
<?php
}
add_action('wp_footer', 'cherish_skip');

/* Add a 'home' button to our menu            'hem' knapp i menyn*/
function cherish_menu( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu', 'cherish_menu' );


/* Enqueue fonts and scripts*/
 function cherish_styles_scripts() {
    wp_register_style( 'cherish_Font','//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic' );
	wp_register_style( 'cherish_Font2','//fonts.googleapis.com/css?family=Lily+Script+One' );

	wp_enqueue_style( 'cherish_style', get_stylesheet_uri() );
    wp_enqueue_style( 'cherish_Font' );
	wp_enqueue_style( 'cherish_Font2' );
	
	/* Enqueue comment reply / threaded comments. */
	if ( ! is_admin() ){
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
			wp_enqueue_script( 'comment-reply' ); 
		}
	}
	
	wp_enqueue_script( 'cherish_skrollr', get_template_directory_uri() . '/inc/skrollr.js', array( 'jquery' ) );
	wp_enqueue_script( 'cherish_fitvids', get_template_directory_uri() . '/inc/jquery.fitvids.js', array('jquery'), '', TRUE ); 
	wp_enqueue_script( 'cherish_js', get_template_directory_uri() . '/inc/cherish.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'cherish_styles_scripts' );


/*Enqueue the color picker for the meta box that lets the user change the background color of the posts*/
function cherish_color_enqueue() {
    global $typenow;
    if( $typenow == 'post' ) {
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'meta-box-color-js', get_template_directory_uri() . '/inc/meta-box-color.js', array( 'wp-color-picker' ) );
    }
}
add_action( 'admin_enqueue_scripts', 'cherish_color_enqueue' );


/* Add title and class to read more links */
add_filter( 'get_the_excerpt', 'cherish_custom_excerpt_more',100 );
add_filter( 'excerpt_more', 'cherish_excerpt_more',100 );
add_filter( 'the_content_more_link', 'cherish_content_more', 100 );

 function cherish_continue_reading($id ) {
	return '<a href="' . get_permalink( $id ) . '" class="more-link">' . __( 'Read more: ', 'cherish' ) . get_the_title( $id) . '</a>';
}
 
function cherish_content_more( $more ) {
	global $id;
	return cherish_continue_reading( $id );
}
 
function cherish_excerpt_more( $more ) {
	global $id;
	return '... ' . cherish_continue_reading( $id );
}

function cherish_custom_excerpt_more($output) {
	if ( has_excerpt() && !is_attachment() ) {
		global $id;
		$output .= ' ' . cherish_continue_reading( $id );
	}
	return $output;
}

/* Register widget areas        Skapa widgets*/
/* Note that the footer widgets are only shown on the front page*/
function cherish_widgets_init() {
	register_sidebar( array(
		'name'         => __( 'Frontpage Footer widget 1', 'cherish'),
		'description'  => __( 'Widgets in this area will be shown on the left-hand side.', 'cherish' ),
		'before_title' => '<h1 class="widgettitle">',
		'after_title'  => '</h1>',
	) );
	
	register_sidebar( array(
		'name'         => __( 'Frontpage Footer widget 2', 'cherish' ),
		'description'  => __( 'Widgets in this area will be shown in the middle', 'cherish' ),
		'before_title' => '<h1 class="widgettitle">',
		'after_title'  => '</h1>',
	));
	
	register_sidebar( array(
		'name'         => __( 'Frontpage Footer widget 3', 'cherish' ),
		'description'  => __( 'Widgets in this area will be shown on the right-hand side.', 'cherish' ),
		'before_title' => '<h1 class="widgettitle">',
		'after_title'  => '</h1>',
	) );
}
add_action( 'widgets_init', 'cherish_widgets_init' );


/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function cherish_wp_title( $title, $sep ) {
	global $page, $paged;
	if ( is_feed() ){
		return $title;
	}
	// Add the blog name
	$title .= get_bloginfo( 'name' );
	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ){
		$title .= " $sep $site_description";
	}
	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 ){
		$title .= " $sep " . sprintf( __( 'Page %s', 'cherish' ), max( $paged, $page ) );
	}	
	if ( is_404() ) {
        $title .=  " $sep " . sprintf( __( 'Page not found', 'cherish' ) );
    }
	return $title;
}
add_filter( 'wp_title', 'cherish_wp_title', 11, 2 );

//Customizer and metabox
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/metabox.php';

/* Add a title to posts that are missing title */
function cherish_post_title( $title ) {
	if ( $title == '' ) {
		return __( 'No title', 'cherish' );
	}else{
		return $title;
	}
}
add_filter( 'the_title', 'cherish_post_title' );


/* Comments */
function cherish_comment($comment, $args, $depth) {
	//If you want to hide all comments, first turn comments off, then uncomment this line below and one line at the end: scroll down!
	//if ( comments_open() ) {

		$GLOBALS['comment'] = $comment;
		?>
		<li <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<div class="comment-author vcard">
		<?php 
		if ( get_avatar( $comment ) ){
				echo get_avatar( $comment, '44'); 
		}else{
			/*If avatars are off, show a font-awesome icon.*/
			echo '<i class="avataroff fa-big"></i>';
		}
		printf('<div class="fn">%s</div>', get_comment_author_link() );		
		?>
			<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __('%1$s at %2$s','cherish'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link( __('(Edit)', 'cherish'),'  ','' );
				?>
			</div>
		</div>
		<?php 
		comment_text();
		if ( $comment->comment_approved == '0' ) { 
		?>
			<em class="comment-awaiting-moderation"><?php __('Your comment is awaiting moderation.', 'cherish') ?></em>
		<?php 
		}
		if ( comments_open() ) {
		?>
			<div class="reply" title="<?php _e('Reply', 'cherish');?>">
			<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<i class="reply-link fa-big"></i>' ))) ?>
			</div>
		<?php 
		}
		echo '</div>';
	//If you want to hide all comments, first turn comments off, then uncomment this line below:
	//}
}

function cherish_meta(){
	echo '<div class="meta"><p>';
	if ( get_theme_mod( 'cherish_hide_meta' ) == '' ) {
			_e('By ', 'cherish');
			printf(('<a href="%3$s" title="%4$s" rel="author">%5$s</a> <a href="%1$s" rel="bookmark">%2$s</a> '),
			esc_url( get_permalink() ),
			esc_html( get_the_date(get_option('date_format')) ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'cherish' ), get_the_author() ) ),
			get_the_author()
		);	
		if ( comments_open() ) {
			comments_popup_link();			
		}
		if ( count( get_the_category() ) ) { 
			echo ' ' . get_the_category_list(', ');
		}
		if ( get_the_tag_list() ) {
			echo ' ' . get_the_tag_list( '', ', ' );
		}
		echo ' ';
		edit_post_link( __( 'Edit', 'cherish' ));
	}
	echo '</p><hr class="alignleft"><div class="divider"></div><hr class="alignright"></div>';
}
