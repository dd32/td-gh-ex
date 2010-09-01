<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-main">
 *
 * @package WordPress
 * @subpackage Graphene
 * @since graphene 1.0
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php 
		if(is_home()) {  
			echo get_bloginfo('description') . " &raquo; " . get_bloginfo('name'); 
		} 
		else { 
			echo wp_title('', false) . " &raquo; " . get_bloginfo('name'); 
		} 
		?>	
    </title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 
    <style type="text/css" media="screen">@import "<?php echo get_stylesheet_uri(); ?>";</style>  
      <!--[if lte IE 6]>
      	  <style>#container{background:none;}</style>
          <script>
          	sfHover=function(){var sfEls=document.getElementById("menu").getElementsByTagName("li");for(var i=0;i<sfEls.length;i++){sfEls[i].onmouseover=function(){this.className+=" sfhover";}
sfEls[i].onmouseout=function(){this.className=this.className.replace(new RegExp(" sfhover\\b"),"");}}}
if(window.attachEvent)window.attachEvent("onload",sfHover);
          </script>
      <![endif]-->
       
    <?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
	?>
</head>
<body <?php body_class(); ?>>
	<div id="container">
    	<div id="top-bar">
        	<p id="rss"><a href="<?php bloginfo('rss2_url'); ?>" title="<?php esc_attr_e('Subscribe to RSS feed', 'graphene'); ?>"><span><?php _e('Subscribe to RSS feed', 'graphene'); ?></span></a></p>
            
            <?php 
			/**
			 * Retrieves our custom search form. Note that this search form is only used
			 * in the top bar of the theme. Since the theme uses the default wordpress
			 * search form somewhere else, we do not use get_search_form() here.
			*/ 
			?>
            <div id="top_search">
            <?php get_search_form(); ?>
            </div>
        </div>
        <?php
        if ( is_singular() && has_post_thumbnail( $post->ID ) &&( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&	$image[1] >= HEADER_IMAGE_WIDTH ) {
			// Houston, we have a new header image!
			// Gets only the image url. It's a pain, I know! Wish Wordpress has better options on this one
			$header_img = get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
			$header_img = explode('" class="', $header_img);
			$header_img = $header_img[0];
			$header_img = explode('src="', $header_img);
			$header_img = $header_img[1];
		} else {
			$header_img = get_header_image();
		}
		
		// Gets the colour for header texts, or if we should display them at all
		if ( 'blank' == get_theme_mod('header_textcolor', HEADER_TEXTCOLOR) || '' == get_theme_mod('header_textcolor', HEADER_TEXTCOLOR))
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
		?>
        <div id="header" style="background-image:url(<?php echo $header_img; ?>);">
        	<h1 <?php echo $style; ?>><a <?php echo $style; ?> href="<?php home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
            <h2 <?php echo $style; ?>><?php bloginfo('description'); ?></h2>
        </div>
        <div id="nav">
        	<!-- BEGIN dynamically generated and highlighted menu -->
        	<?php wp_nav_menu(array('container' => '', 'menu_id' => 'menu', 'menu_class' => 'clearfix', 'fallback_cb' => 'graphene_default_menu', 'depth' => 5, 'theme_location' => 'Header Menu')); ?>
            <!-- END dynamically generated and highlighted menu -->
        </div>
        <div id="content" class="clearfix<?php if (is_page_template('page-onecolumn.php')) {echo ' one_column';} ?>">
        	<div id="content-main" class="clearfix">