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
		add_theme_support( "title-tag" );
		
		add_theme_support( 'woocommerce' );
		
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
		.site-title,
		.site-description {
			color: #' . esc_attr( get_header_textcolor() ) . '; ';

		if( get_theme_mod( 'cherish_text_shadow_active' ) <> '' ) {
			echo 'text-shadow: 2px 2px 3px ' .  esc_attr( get_theme_mod( 'cherish_text_shadow') ) . ';';
		}
		echo '}';
		
		if( get_theme_mod( 'cherish_footer_color' ) <> '' ) {
			echo '#footer .site-title a,
			#footer .site-description,
			.footer-credit, 
			.footer-credit a{
				color:' .  esc_attr( get_theme_mod( 'cherish_footer_color' ) )  . ';}';
		}
		
		echo '#header{
			background:url("' . get_header_image() . '");
			height:' .  get_custom_header()->height . 'px;
			}';
		
		if ( get_theme_mod( 'cherish_hide_action' ) == '' ) {	
			if ( get_theme_mod( 'cherish_action_color' ) <> '') {
				echo '#action, #action a{color:' . esc_attr( get_theme_mod( 'cherish_action_color' ) ) . ';}';
			}
			if ( get_theme_mod( 'cherish_action_bgcolor' ) <> '' ) {
				echo '#action{background-color:' . esc_attr( get_theme_mod( 'cherish_action_bgcolor' ) ) . ';}';
			}
			if ( get_theme_mod( 'cherish_action_size' ) <> '' ) {
				echo '#action{font-size:' . esc_attr( get_theme_mod( 'cherish_action_size' ) ) . 'em;}';
			}
		}
		
		echo 'a:focus, .site-title a:focus, #footer a:focus, #header-menu a:focus{text-decoration:underline;}';
		
	echo '</style>';
}
add_action( 'wp_head', 'cherish_customize_css');


/* Enqueue fonts and scripts*/
 function cherish_styles_scripts() {
    wp_enqueue_style( 'cherish_Font','//fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic' );
    wp_enqueue_style( 'cherish_Font2','//fonts.googleapis.com/css?family=Lily+Script+One' );

	wp_enqueue_style( 'cherish_style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'cherish_woo', get_template_directory_uri() . '/inc/woocommerce.css');
	 
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
		'id'            => 'sidebar-1',
	) );
	
	register_sidebar( array(
		'name'         => __( 'Frontpage Footer widget 2', 'cherish' ),
		'description'  => __( 'Widgets in this area will be shown in the middle', 'cherish' ),
		'before_title' => '<h1 class="widgettitle">',
		'after_title'  => '</h1>',
		'id'            => 'sidebar-2',
	));
	
	register_sidebar( array(
		'name'         => __( 'Frontpage Footer widget 3', 'cherish' ),
		'description'  => __( 'Widgets in this area will be shown on the right-hand side.', 'cherish' ),
		'before_title' => '<h1 class="widgettitle">',
		'after_title'  => '</h1>',
		'id'            => 'sidebar-3',
	) );
}
add_action( 'widgets_init', 'cherish_widgets_init' );


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
		printf('<h3>%s</h3>', get_comment_author_link() );		
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
			<div class="reply" title="<?php printf( __('Reply to %s', 'cherish'), get_comment_author() ); ?>">
			<?php comment_reply_link(array_merge( $args, array('add_below' => 'div-comment', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<i class="reply-link fa-big"></i>' ))) ?>
			</div>
		<?php 
		}
		echo '</div>';
}

function cherish_meta(){
	global $id;
	
	echo '<div class="meta"><p>';
	if ( get_theme_mod( 'cherish_hide_meta' ) == '' ) {
			_e('By ', 'cherish');
			printf(('<a href="%3$s" title="%4$s" rel="author">%5$s</a> %2$s.'),
			esc_url( get_permalink() ),
			esc_html( get_the_date(get_option('date_format')) ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'cherish' ), get_the_author() ) ),
			get_the_author()
		);
		
		echo '&nbsp; ';
		
		if ( comments_open() ) {
			comments_popup_link();			
		}
		
		echo '&nbsp; ';
		
		if ( count( get_the_category() ) ) { 
			echo ' ' . get_the_category_list(', ');
		}
		
		echo '&nbsp; ';
		
		if ( get_the_tag_list() ) {
			echo ' ' . get_the_tag_list( '', ', ' );
		}
		
		echo '&nbsp; ';
		
		edit_post_link( __( 'Edit', 'cherish' ) . ' <span class="screen-reader-text">' . get_the_title( $id ) . '</span>');
	}
	if ( get_theme_mod( 'cherish_details' ) == '' ) {
		if ( get_theme_mod( 'cherish_details_black' ) <> '' ) {
			echo '</p><hr class="alignleft black"><div class="divider-black"></div><hr class="alignright black"></div>';
		}else{
			echo '</p><hr class="alignleft"><div class="divider"></div><hr class="alignright"></div>';
		}
	}else{
		echo '</p></div>';
	}
}

//Thanks: http://www.evagoras.com/2012/11/01/how-to-handle-and-customize-an-empty-search-query-in-wordpress/
function cherish_search($query) {
    // If 's' request variable is set but empty
    if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
        $query->is_search = true;
        $query->is_home = false;
    }
    return $query;
}
add_filter('pre_get_posts','cherish_search');

