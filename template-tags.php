<?php
/*
***** becorp Template Tags
	* Add Class Gravtar
*/
if(! function_exists('becorp_gravatar_class')) :
	add_filter('get_avatar','becorp_gravatar_class');
	function becorp_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='comment_img", $class);
    return $class;
	}
 endif;
 
 /*
 * becorp Archive Title
 */
 if ( ! function_exists( 'becorp_archive_title' ) ) :
function becorp_archive_title( $before = '<div class="col-md-6 text-right wow fadeInRight animated" data-wow-delay=".8s"><h2>', $after = '</h2></div>' ) {
	if( is_archive() )
	{
	
	if ( is_category() ) {
		$title = sprintf( __( 'Category: %s', 'becorp' ), '<span>' . single_cat_title( '', false ) . '</span>' );
	} elseif ( is_tag() ) {
		$title = sprintf( __( 'Tag: %s', 'becorp' ), '<span>' . single_tag_title( '', false ) . '</span>' ); 
	} elseif ( is_author() ) {
		$title = sprintf( __( 'Author: %s', 'becorp' ), '<a href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a>' ); 
	} elseif ( is_year() ) {
		$title = sprintf( __( 'Year: %s', 'becorp' ), get_the_date( _x( 'Y', 'yearly archives date format', 'becorp' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( 'Month: %s', 'becorp' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'becorp' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( 'Day: %s', 'becorp' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'becorp' ) ) );
	}  elseif ( is_post_type_archive() ) {
		$title = sprintf( __( 'Archives: %s', 'becorp' ), post_type_archive_title( '', false ) );
	}
	} elseif( is_search() )
	{
		$title = sprintf( __( 'Search Results for : %s', 'becorp' ), get_search_query() );
	}
	elseif( is_author() )
	{
		$title = sprintf( __( 'Author: %s', 'becorp' ), get_the_author() );
	}
	elseif( is_404() )
	{
		$title = sprintf( __( 'Error 404  : Page Not Found', 'becorp' ) );
	}
	else
	{
		echo '<div class="col-md-6 text-right wow fadeInRight animated" data-wow-delay=".8s"><h2>'.get_the_title().'</h2></div>';
	}	
	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	//$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;
	}
}
endif;


// Site Footer Function
// Contains the closing of the #content div and all content after
function becorp_wp_footer () { ?>
<div class="footer"> 
 <div class="container">
       <div class="row">
		<?php if ( is_active_sidebar( 'footer-widget-area' ) )
			{?>
			<div class="">
				<?php dynamic_sidebar( 'footer-widget-area' ); ?>
			</div>	
			<?php } ?>    		
    </div>
    </div>
</div>
<!----copyright----->
<?php $becorp_options=becorp_theme_default_data(); 
			$footer_setting = wp_parse_args(  get_option( 'becorp_option', array() ), $becorp_options ); ?>
<div class="copyright_info">
    <div class="container">
	  <div class="row">
        <div class="col-md-6 wow fadeInLeft animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
            <b><?php if($footer_setting['footer_customization_text'] !='') { echo esc_attr($footer_setting['footer_customization_text']); } 
			if($footer_setting['footer_customization_develop'] !='') { echo "-" .esc_attr($footer_setting['footer_customization_develop']); } ?>
			<a target="_blank" rel="nofollow" href="<?php if($footer_setting['develop_by_link'] !='') { echo esc_url($footer_setting['develop_by_link']); } ?>"><?php if($footer_setting['develop_by_name'] !='') { echo esc_attr($footer_setting['develop_by_name']); } ?></a></b>
        </div>
    	<div class="col-md-6 wow fadeInRight animated" data-wow-delay=".5s" style="visibility: visible; -webkit-animation-delay: .5s;">
		 <ul class="top-social footer_social_links">
            <?php if($footer_setting['header_social_media_enabled']== 1 ) {

					if($footer_setting['social_media_twitter_link']!='') {?>
						<li><a class="icon-twitter" href="<?php echo esc_url($footer_setting['social_media_twitter_link']); ?>"<?php if( $footer_setting['twitter_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					if($footer_setting['social_media_facebook_link'] != '') { ?>
						<li><a class="icon-facebook" href="<?php echo esc_url($footer_setting['social_media_facebook_link']); ?>"<?php if( $footer_setting['facebook_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }  
						if($footer_setting['social_media_linkedin_link']!='') { ?> 
						<li><a class="icon-linkedin" href="<?php echo esc_url($footer_setting['social_media_linkedin_link']); ?>"<?php if( $footer_setting['linkedin_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					if($footer_setting['social_media_dribbble_link']!='') { ?> 
						<li><a class="icon-dribbble" href="<?php echo esc_url($footer_setting['social_media_dribbble_link']); ?>"<?php if( $footer_setting['dribbble_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					if($footer_setting['social_media_google_link']!='') { ?> 
						<li><a class="icon-google-plus" href="<?php echo esc_url($footer_setting['social_media_google_link']); ?>"<?php if( $footer_setting['google_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php }
					if($footer_setting['social_media_rss_link']!='') { ?> 
						<li><a class="icon-rss" href="<?php echo esc_url($footer_setting['social_media_rss_link']); ?>"<?php if( $footer_setting['rss_media_enabled'] ==1 ) { echo "target='_blank'"; } ?>></a></li>
						<?php } } ?>
		  </ul>	
    	</div>
      </div>
    </div>
</div>
<!--Scroll To Top--> 
<a href="#" class="hc_scrollup"><i class="fa fa-chevron-up"></i></a>
<!--/Scroll To Top-->
<?php
} // end of becorp_wp_footer
// end of becorp_wp_footer

if ( ! function_exists( 'asiathemes_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function asiathemes_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'post-navigation' : 'paging-navigation';
	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'becorp' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'becorp' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'becorp' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'becorp' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'becorp' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>
		<div class="clear"></div>
	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
}
endif;
// code for service index excerpt
	function blog_widget_excerpt(){
	  global $post;
	$excerpt = get_the_content();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$original_len = strlen($excerpt);

	$excerpt = substr($excerpt, 0, 50);

	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));

	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));

	$len=strlen($excerpt);
	return $excerpt;
	}
	
	// code for service index excerpt
	function home_blog_excerpt(){
	  global $post;
	$excerpt = get_the_content();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$original_len = strlen($excerpt);

	$excerpt = substr($excerpt, 0, 150);

	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));

	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));

	$len=strlen($excerpt);
	return $excerpt;
	}
	
	// code to change length of service two column excerpt
function get_service_excerpt(){
	global $post;
	$excerpt = get_the_content();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$original_len = strlen($excerpt);
	$excerpt = substr($excerpt, 0, 150);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
	$len=strlen($excerpt);
	 if($original_len>150)
	   $excerpt = $excerpt.'<br /><a class="btn btn-readmore" href="'. get_permalink($post->ID) . '">'.__('Read More','becorp').'</a>';
	return $excerpt;

	return $excerpt;
}
// code for service index excerpt
	function home_slider_excerpt(){
	  global $post;
	$excerpt = the_content();
	$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
	$excerpt = strip_shortcodes($excerpt);
	$excerpt = strip_tags($excerpt);
	$original_len = strlen($excerpt);

	$excerpt = substr($excerpt, 0, 150);

	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));

	$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));

	$len=strlen($excerpt);
	 if($original_len>150)
	   $excerpt = $excerpt.'<br /><a class="main-btn btn-more" href="'. get_permalink($post->ID) . '">'.__('MORE','becorp').'</a>';
	return $excerpt;

	return $excerpt;
	}
	
if ( ! function_exists( 'becorp_the_custom_logo' ) ) :

function becorp_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
?>