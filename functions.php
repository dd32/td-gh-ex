<?php
if ( ! isset( $content_width ) ) $content_width = 700;

if ( ! function_exists( 'bunny_setup' ) ) :
	function bunny_setup() {
	
		$bunny_ch = array(
			'default-image'          => '',
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => false,
			'uploads'                => false,
			'random-default'         => false,
			'header-text'            => true,
			'default-text-color'     => '000000',
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
		);
		
		add_theme_support( 'custom-logo', array(
			'height'      => 140,
			'width'       => 200,
			'flex-height' => false,
			'flex-width'  => true,
		) );

		add_theme_support( 'title-tag' );
		add_theme_support( 'custom-header', $bunny_ch );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'html5', array( 'gallery', 'caption' ) );

		/* translate */
		load_theme_textdomain( 'bunny', get_template_directory() . '/languages' );
		
		/* add menu */
		register_nav_menus( array('header' => __( 'Header Navigation', 'bunny' ) ) );
		
		add_editor_style();
	}
endif;
add_action( 'after_setup_theme', 'bunny_setup' );


function bunny_fonts_url() {
    $fonts_url = '';
 	/* Translators: If there are characters in your language that are not
	* supported by Oswald, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$oswald = _x( 'on', 'Oswald font: on or off', 'bunny' );
	 
	/* Translators: If there are characters in your language that are not
	* supported by Open Sans, translate this to 'off'. Do not translate
	* into your own language.
	*/
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'bunny' );

	 if ( 'off' !== $oswald || 'off' !== $open_sans ) {
		$font_families = array();
 
		if ( 'off' !== $oswald ) {
			$font_families[] = 'Oswald:400,700,300';
		}
		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open+Sans:400italic,400,700';
		}
		
		//&subset=latin,greek-ext,vietnamese,greek,latin-ext,cyrillic
		
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

	}
    return $fonts_url;
}


/* Enqueue fonts, styles and js*/
 function bunny_fonts_styles() {
	wp_enqueue_style( 'bunny_style', get_stylesheet_uri() );	
	wp_enqueue_style( 'bunny-fonts', bunny_fonts_url(), array(), null );
	
	/* Only enqueue the scripts for the animation and arc if they are needed. */
	if ( get_theme_mod( 'bunny_animation' ) == '') {
		wp_enqueue_script( 'bunny_sprite', get_template_directory_uri() . '/inc/spritely.js', array( 'jquery' ) );
	}
	if ( get_theme_mod( 'bunny_disable_arc' ) == '') {
		wp_enqueue_script( 'bunny_circletype', get_template_directory_uri() . '/inc/circletype.js', array( 'jquery' ) );
	}
	
	wp_enqueue_script( 'bunny_js', get_template_directory_uri() . '/inc/bunny.js', array( 'jquery' ) );
	
	/* Enqueue comment reply / threaded comments. */
	if ( ! is_admin() ){
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
			wp_enqueue_script( 'comment-reply' ); 
		}
	}
		
	/* Add Easter eggs */
	if ( get_theme_mod( 'bunny_easter_eggs' )) {
		wp_register_style('bunny_eggs', get_template_directory_uri() . '/eggs.css');
		wp_enqueue_style('bunny_eggs');
		
	/* Add that Christmas feeling */	
	}elseif ( get_theme_mod( 'bunny_christmas' )) {
		wp_register_style('bunny_christmas', get_template_directory_uri() . '/christmas.css');
		wp_enqueue_style('bunny_christmas');
	}
}
add_action('wp_enqueue_scripts', 'bunny_fonts_styles');


function bunny_css() {
	echo '<style type="text/css">
		.site-title, .site-description { color: #' . esc_attr( get_header_textcolor() ) . ';}';
			
	if (! has_nav_menu( 'header' ) ) {
		echo '.site-title{margin-top:6px;}';
	}

	if (get_theme_mod( 'bunny_hide' )){
		echo '#wrapper{margin:40px auto auto auto;}
		#main{position:relative; overflow: auto;	float:none;	margin:0 auto;}
		#footer{position:relative; overflow: auto;	float:none;	margin-top:40px;}
		@media screen and (max-width:840px){
			#wrapper{margin-top:40px; margin-left:1%;}
			.kaninsmall{display:none;}
		}
		@media screen and (max-width:600px){
			.kaninsmall{display:none;}
		}';
		
		/*center the main content when there is no sidebar*/
		if (! is_active_sidebar('sidebar_widget')){
			echo '#main, #footer {display:block;}';
		}
	}
	
	if ( display_header_text() AND get_bloginfo('name') == '') {
		echo '.site-description{margin-top:90px;}';
	}
	
	if ( display_header_text() AND get_theme_mod( 'bunny_disable_arc' ) AND get_bloginfo('name') <> '') {
		echo '.site-description{margin-top:-20px;}';
	}	
	
	if ( display_header_text() AND get_theme_mod( 'bunny_disable_arc' ) AND get_bloginfo('name') == '') {
		echo '.site-description{margin-top:60px;}';
	}
	
	if ( !display_header_text() ) {
		echo '.logo{margin-bottom:66px;}';
	}	
	echo '</style>';
}
add_action( 'wp_head', 'bunny_css' );


/* Add title to read more links */
add_filter( 'get_the_excerpt', 'bunny_custom_excerpt_more',100 );
add_filter( 'excerpt_more', 'bunny_excerpt_more',100 );
add_filter( 'the_content_more_link', 'bunny_content_more', 100 );

function bunny_continue_reading($id ) {
	return '<a href="'.get_permalink( $id ).'">' . __( 'Read more: ', 'bunny' ) . get_the_title($id) . '</a>';
}
 
function bunny_content_more($more) {
	global $id;
	return bunny_continue_reading( $id );
}
 
function bunny_excerpt_more($more) {
	global $id;
	return '... '.bunny_continue_reading( $id );
}

function bunny_custom_excerpt_more($output) {
	if (has_excerpt() && !is_attachment()) {
		global $id;
		$output .= ' '.bunny_continue_reading( $id );
	}
	return $output;
}


/* Add a title to posts that are missing title */
add_filter( 'the_title', 'bunny_post_title' );
function bunny_post_title( $title ) {
	if ( $title == '' ) {
		return __( 'Untitled', 'bunny' );
	}else{
		return $title;
	}
}

/* Register widget areas (Sidebars)        Skapa sidebars*/
function bunny_widgets_init() {
	register_sidebar(
		array(
		'name' => __( 'Footer Widget area', 'bunny' ),
		'id' => 'footer_widget',
  		'description' => __( 'Widgets in this area will be shown in the footer.', 'bunny' ),
		)
	);
	
	register_sidebar(
		array(
		'name' => __( 'Sidebar', 'bunny' ),
		'id' => 'sidebar_widget',
  		'description' => __( 'Widgets in this area will be shown in the right hand sidebar.', 'bunny' ),
		)
	);
}
add_action( 'widgets_init', 'bunny_widgets_init' );


/* Comments */
function bunny_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
		?>


		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>

		<div class="comment-author vcard">
		<?php 
		if (get_avatar($comment, $args['avatar_size'] )){
			if ($args['avatar_size'] != 0) {
				echo get_avatar( $comment, $args['avatar_size'] ); 
			}
		}else{
			echo '<i class="avataroff fa"></i>';
		}
		printf('<div class="fn">%s</div>', get_comment_author_link());		
		?>
			<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
				<?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s','bunny'), get_comment_date(),  get_comment_time()) ?></a>
			</div>
		</div>
		<?php comment_text() ?>
		<?php if ($comment->comment_approved == '0') : ?>
			<em class="comment-awaiting-moderation"><?php __('Your comment is awaiting moderation.', 'bunny') ?></em>
			<br />
		<?php 
		endif;
		/*Make sure the reply button only displays if comments are open.*/
		if ( comments_open() ) :
		?>
			<div class="reply" title="<?php _e('Reply', 'bunny');?>">
			<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<i class="reply-link fa"></i>' ))) ?>
			</div>
		<?php 
		endif;
		if ( 'div' != $args['style'] ) : 
			echo '</div>';
		endif; 
}

function bunny_author(){			
	?>
		<div class="author-info">
			<div class="author-avatar fa">
				<?php
				if (get_avatar(get_the_author_meta( 'user_email' ), 32)){
					echo get_avatar(get_the_author_meta( 'user_email' ), 32); 
				}else{
					echo '<i class="avataroff fa"></i>';
				}
				?>
				</div>
				<div class="author-description">
					<h2><?php printf( __('About %s','bunny'), get_the_author() ); ?></h2>
					<?php	
					if ( get_the_author_meta( 'description' ) ) :  
						the_author_meta( 'description' ); 
					endif;
					?>
					<div class="author-link"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ) ); ?>">
					<?php printf( __( 'View all posts by %s', 'bunny' ), get_the_author() ); ?></a>
				</div>
			</div>
		</div>
	<?php
}


function bunny_meta(){
	if ( get_theme_mod( 'bunny_meta' ) == '') {
	?>
		<div class="meta">
			<?php
			if (get_avatar( get_the_author_meta( 'ID' ))){
				printf(('<a href="%1$s" title="%2$s" rel="author">%3$s</a> '),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'bunny' ), get_the_author() ) ),
				get_avatar( get_the_author_meta( 'ID' ), 32 ),
				get_the_author()
				);
			}else{
				printf(('<a href="%1$s" title="%2$s" rel="author"><i class="author-links fa"></i></a> '),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'bunny' ), get_the_author() ) ),
				get_the_author()
				);
			}
			if (!post_password_required() ){
				if ( comments_open() ) :
					comments_popup_link('<i class="comment-icon fa"></i>','<i class="comment-icon fa"></i>','<i class="comment-icon fa"></i>',null,'<i class="comment-icon fa"></i>');		 
					echo '&nbsp;';
				endif;
			}
			if ( count( get_the_category() ) ) : 
				echo '<div class="cat-links2" title="' . __('Category', 'bunny') . '">';
				echo '<i class="cat-links fa"></i>';
				echo get_the_category_list(', ');
				echo '</div> ';
			endif; 	
			if(get_the_tag_list()) {
				echo '<div class="tag-links2"  title="' . __('Tags', 'bunny') .'">';
				echo '<i class="tag-links fa"></i>';
				echo get_the_tag_list( '', ', ' );
				echo '</div>';
			}
			
			edit_post_link(' <i class="edit-links fa"></i> ');
			if(is_single()){
				bunny_author();
			}
		?>
		</div>
	<?php
	}
}


function bunny_js(){
	?>
	<script type="text/javascript">
	<!--//--><![CDATA[//><!--
	<?php if ( get_theme_mod( 'bunny_animation' ) == '') {?>
			jQuery(document).ready(function($) {
				$('#far-clouds').pan({fps: 30, speed: 0.5, dir: 'left', depth: 30});
				$('#near-clouds').pan({fps: 30, speed: 0.7, dir: 'right', depth: 70}); 
				$('#kaninf').sprite({fps: 1.8, no_of_frames: 8, speed: 1});
			});			
	<?php }?>
	
	<?php if ( get_theme_mod( 'bunny_disable_arc' ) == '') {?>	
		jQuery(document).ready(function($) {
			$('#headline').circleType({radius:<?php echo esc_attr(get_theme_mod('bunny_title_arc_size','400' ))?>});
			$('#tagline').circleType({radius:<?php echo esc_attr(get_theme_mod('bunny_tagline_arc_size','400' ))?>});
		}); 
	<?php }?>
	//--><!]]>
	 </script>
<?php
}
add_action('wp_footer', 'bunny_js');

//Customizer
require get_template_directory() . '/inc/customizer.php';
?>