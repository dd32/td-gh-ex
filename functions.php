<?php  
  function template_setup() 
  {
    global $favicon_url, $footer_text, $content_width;
	
	load_theme_textdomain('adsticle', TEMPLATEPATH . '/languages');
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if (is_readable($locale_file ))
	  require_once($locale_file);	

    if (function_exists('add_theme_support')) 
	{
      add_theme_support('menus');	  
      register_nav_menu('primary', __('primary', 'adsticle'));	
	};
	
	if ( ! isset( $content_width ) ) $content_width = 1000;
	
	add_theme_support( 'automatic-feed-links' );
	
  };
  
  add_action( 'init', 'template_setup' );


  if ( function_exists('register_sidebar') )
  { 	
	register_sidebar(array(
        'name' => 'text-widget-area-for-ads468x60-in-header',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));	
  	
    register_sidebar(array(
        'name' => 'big1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
		
	register_sidebar(array(
        'name' => 'small-left1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget_body">',
    ));
	
	register_sidebar(array(
        'name' => 'small-right1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget_body">',
    ));
	
	register_sidebar(array(
        'name' => 'big2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget_body">',
    ));
	
	register_sidebar(array(
        'name' => 'small-left2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget_body">',
    ));
	
	register_sidebar(array(
        'name' => 'small-right2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3><div class="widget_body">',
    ));
	
	
  };
  
  function adsticle_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'adsticle' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'adsticle' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'adsticle' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'adsticle' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'adsticle' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'adsticle' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
  };
?>