<?php
/**
 * Blog functions.
 *
 * @package ThinkUpThemes
 */


//----------------------------------------------------------------------------------
//	HIDE POST TITLE
//----------------------------------------------------------------------------------

function thinkup_input_blogtitle() {

	echo	'<h2 class="blog-title">',
		'<a href="' . esc_url( get_permalink() ) . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'engrave-lite' ), the_title_attribute( 'echo=0' ) ) . '">' . get_the_title() . '</a>',
		'</h2>';
}


//----------------------------------------------------------------------------------
//	BLOG CONTENT
//----------------------------------------------------------------------------------

// Input post thumbnail / featured media - Style 2
function thinkup_input_blogimage() {
global $post;

	echo '<div class="blog-thumb"><a href="'. esc_url( get_permalink($post->ID) ) . '">' . get_the_post_thumbnail( $post->ID, 'column1-2/5' ) . '</a></div>';
}

// Input post excerpt / content to blog page
function thinkup_input_blogtext() {
global $post;

// Get theme options values.
$thinkup_blog_postswitch = thinkup_var ( 'thinkup_blog_postswitch' );

	// Output full content - EDD plugin compatibility
	if( function_exists( 'EDD' ) and is_post_type_archive( 'download' ) ) {
		the_content();
		return;
	}

	// Output post content
	if ( is_search() ) {
		the_excerpt();
	} else if ( ! is_search() ) {
		if ( ( empty( $thinkup_blog_postswitch ) or $thinkup_blog_postswitch == 'option1' ) ) {
			if( ! is_numeric( strpos( $post->post_content, '<!--more-->' ) ) ) {
				the_excerpt();
			} else {
				the_content();
				wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'engrave-lite' ), 'after'  => '</div>', ) );
			}
		} else if ( $thinkup_blog_postswitch == 'option2' ) {
			the_content();
			wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'engrave-lite' ), 'after'  => '</div>', ) );
		}
	}
}


//----------------------------------------------------------------------------------
//	BLOG META CONTENT & POST META CONTENT
//----------------------------------------------------------------------------------

// Input blog format
function thinkup_input_blogformat() {

	if ( get_post_format() == 'gallery' ) {
		echo '<div class="blog-icon gallery"><a href="' . esc_url( get_permalink() ) . '"><i class="fa fa-image fa-lg"></i></a></div>';
	} else if ( get_post_format() == 'image' ) {
		echo '<div class="blog-icon image"><a href="' . esc_url( get_permalink() ) . '"><i class="fa fa-image fa-lg"></i></a></div>';
	} else if ( get_post_format() == 'video' ) {
		echo '<div class="blog-icon video"><a href="' . esc_url( get_permalink() ) . '"><i class="fa fa-film fa-lg"></i></a></div>';
	} else if ( get_post_format() == 'audio' ) {
		echo '<div class="blog-icon audio"><a href="' . esc_url( get_permalink() ) . '"><i class="fa fa-volume-up fa-lg"></i></a></div>';
	} else if ( get_post_format() == 'status' ) {
		echo '<div class="blog-icon status"><a href="' . esc_url( get_permalink() ) . '"><i class="fa fa-rss fa-lg"></i></a></div>';
	} else if ( get_post_format() == 'quote' ) {
		echo '<div class="blog-icon quote"><a href="' . esc_url( get_permalink() ) . '"><i class="fa fa-quote-left fa-lg"></i></a></div>';
	} else if ( get_post_format() == 'link' ) {
		echo '<div class="blog-icon link"><a href="' . esc_url( get_permalink() ) . '"><i class="fa fa-link fa-lg"></i></a></div>';
	} else if ( get_post_format() == 'chat' ) {
		echo '<div class="blog-icon chat"><a href="' . esc_url( get_permalink() ) . '"><i class="fa fa-comment-o fa-lg"></i></a></div>';
	}
}

// Input sticky post
function thinkup_input_sticky() {
	printf( '<span class="sticky"><i class="fa fa-thumb-tack"></i><a href="%1$s" title="%2$s">' . __( 'Sticky', 'engrave-lite' ) . '</a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_title() )
	);
}

// Input blog date
function thinkup_input_blogdate() {
	printf( '<span class="date"><i class="fa fa-calendar-o"></i><a href="%1$s" title="%2$s"><time datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_title() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}

// Input blog comments
function thinkup_input_blogcomment() {

	if ( '0' != get_comments_number() ) {
		echo	'<span class="comment"><i class="fa fa-comments"></i>';
			if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {;
				comments_popup_link( __( '0 Comments', 'engrave-lite' ), __( '1 Comment', 'engrave-lite' ), __( '% Comments', 'engrave-lite' ) );
			};
		echo	'</span>';
	}
}

// Input blog categories
function thinkup_input_blogcategory() {
$categories_list = get_the_category_list( __( ', ', 'engrave-lite' ) );

	if ( $categories_list && thinkup_input_categorizedblog() ) {
		echo	'<span class="category"><i class="fa fa-folder-open-o"></i>';
		printf( '%1$s', $categories_list );
		echo	'</span>';
	};
}

// Input blog tags
function thinkup_input_blogtag() {
$tags_list = get_the_tag_list( '', __( ', ', 'engrave-lite' ) );

	if ( $tags_list ) {
		echo	'<span class="tags"><i class="fa fa-tags"></i>';
		printf( '%1$s', $tags_list );
		echo	'</span>';
	};
}

// Input blog author
function thinkup_input_blogauthor() {
	printf( __( '<span class="author"><i class="fa fa-pencil"></i><a href="%1$s" title="%2$s" rel="author">%3$s</a></span>', 'engrave-lite' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'engrave-lite' ), get_the_author() ) ),
		get_the_author()
	);
}


//----------------------------------------------------------------------------------
//	CUSTOM READ MORE BUTTON.
//----------------------------------------------------------------------------------

// Input 'Read more' link
function thinkup_input_readmore() {
global $post;
	printf( '<p><a href="%1$s" class="more-link themebutton2">' . esc_html__( 'Read More', 'engrave-lite') . '</a></p>',
		esc_url( get_permalink($post->ID) )
	);
}


//----------------------------------------------------------------------------------
//	INPUT BLOG META CONTENT
//----------------------------------------------------------------------------------

function thinkup_input_blogmeta() {

	echo '<div class="entry-meta">';
		if ( is_sticky() && is_home() && ! is_paged() ) { thinkup_input_sticky(); }

		thinkup_input_blogauthor();
		thinkup_input_blogdate();
		thinkup_input_blogcomment();
		thinkup_input_blogcategory();
		thinkup_input_blogtag();
	echo '</div>';
}


//----------------------------------------------------------------------------------
//	INPUT POST META CONTENT
//----------------------------------------------------------------------------------

function thinkup_input_postmeta() {

	echo '<header class="entry-header entry-meta">';
		thinkup_input_blogdate();
		thinkup_input_blogauthor();
		thinkup_input_blogcomment();
		thinkup_input_blogcategory();
		thinkup_input_blogtag();
	echo '</header><!-- .entry-header -->';
}


//----------------------------------------------------------------------------------
//	SHOW AUTHOR BIO
//----------------------------------------------------------------------------------

// HTML for Author Bio
function thinkup_input_postauthorbiocode() {

	echo	'<div id="author-bio">',
			'<div id="author-title">',
			'<h3>About the Author: <a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"/>' . get_the_author() . '</a></h3>',
			'<span class="sep"><span class="sep-core"></span></span>',
			'</div>',
			'<div id="author-image" class="one_sixth">',
			get_avatar( get_the_author_meta( 'email' ), '90' ),
			'</div>',
			'<div id="author-text" class="five_sixth last">',
			wpautop( get_the_author_meta( 'description' ) ),
			'</div>',
			'</div>';
}

// Output Author Bio
function thinkup_input_postauthorbio() {
	thinkup_input_postauthorbiocode();
}


//----------------------------------------------------------------------------------
//	TEMPLATE FOR COMMENTS AND PINGBACKS (PREVIOUSLY IN TEMPLATE-TAGS).
//----------------------------------------------------------------------------------

function thinkup_input_commenttemplate( $comment, $args, $depth ) {

	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php esc_html_e( 'Pingback:', 'engrave-lite'); ?> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'engrave-lite' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
					<?php echo get_avatar( $comment, 60 ); ?>
			<footer>

				<span class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</span>

				<span class="comment-author">
					<?php printf( '%s', sprintf( '%s', get_comment_author_link() ) ); ?>
				</span>
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'engrave-lite'); ?></em>
					<br />
				<?php endif; ?>

				<span class="comment-meta">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php esc_attr( comment_time( 'c' ) ); ?>">
					<?php
						// translators: 1: date, 2: time
						printf( '%1$s', get_comment_date() ); ?>
					</time></a>
					<?php edit_comment_link( esc_html__( 'Edit', 'engrave-lite' ), ' ' );
					?>
				</span>

			<div class="comment-content"><?php comment_text(); ?></div>
			</footer>
		</article><!-- #comment-## -->

	<?php
	break;
	endswitch;
}

// Add themebutton class to reply link
function thinkup_replace_replylinkclass($class){
    $class = str_replace("class='comment-reply-link", "class='comment-reply-link themebutton3", $class);
    return $class;
}
add_filter('comment_reply_link', 'thinkup_replace_replylinkclass');

// List comments in single page
function thinkup_input_comments() {
	$args = array( 
		'callback' => 'thinkup_input_commenttemplate', 
	);
	wp_list_comments( $args );
}


?>