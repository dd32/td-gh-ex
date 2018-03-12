<?php 
 /**
 * NNfy Global Function
 *
 * @package nnfy
 */

/**
* Register Post Excerpt Function
*/
function nnfy_post_excerpt() {
	$excerpt_length = get_theme_mod('nnfy_blog_excerpt_length', 20);

	echo wp_trim_words( get_the_excerpt(), $excerpt_length, '' );
}

/**
* Google Analytics
*/
add_action('wp_head', 'nnfy__google_analytics');
function nnfy__google_analytics(){ 
	$google_analytics = get_theme_mod('nnfy_ga_tracking_id','');
	?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_js( $google_analytics ); ?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?php echo esc_js( $google_analytics ); ?>');
	</script>

<?php }


/**
* Remove Type attr
*/
add_filter('script_loader_tag', 'nnfy_remove_type_attr', 10, 2);
function nnfy_remove_type_attr($tag, $handle) {
    return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
 }

/**
* Get Image ID Form Database
*/
function nnfy_get_image_by_url($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}


/**
* Blog Pagination 
*/
if(!function_exists('nnfy_blog_pagination')){
	function nnfy_blog_pagination(){
		?>
		<div class="paginations text-center pt-20"> <?php
			the_posts_pagination(array(
				'prev_text'          => '<i class="ion-ios-arrow-back"></i>',
				'next_text'          => '<i class="ion-ios-arrow-forward"></i>',
				'type'               => 'list'
			)); ?>
		</div>
		<?php
	}
}

/**
* Create Menu
*/
if( !function_exists('nnfy_fallback')){
function nnfy_fallback( ) { 
	if(is_user_logged_in()):
?>

	<ul>
		<li><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php echo esc_html__('Create Menu','99fy'); ?></a></li>
	</ul>
<?php endif; } }