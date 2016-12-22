<?php 

/**
 * Wp in Progress
 * 
 * @package Wordpress
 * @author WPinProgress
 *
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * It is also available at this URL: http://www.gnu.org/licenses/gpl-3.0.txt
 */

if (!function_exists('suevafree_social_buttons_function')) {

	function suevafree_social_buttons_function() { 
	
		global $post;
		
?>

		<div class="clear"></div>
		
        <div class="socials share">

			<a href="http://www.facebook.com/sharer.php?s=100&p%5Burl%5D=<?php echo get_permalink($post->ID);?>&p%5Bimages%5D%5B0%5D=<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>&p%5Btitle%5D=<?php echo str_replace(' ', '%20', get_the_title()); ?>&p%5Bsummary%5D=<?php echo str_replace(' ', '%20', get_the_excerpt()); ?>" target="_blank" class="social facebook-button" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"> 
				<i class="fa fa-facebook"></i> 
			</a>

			<a href="https://twitter.com/share?text=<?php echo str_replace(' ', '%20', get_the_title()); ?>&url=<?php echo get_permalink($post->ID);?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" target="_blank" class="social twitter-button">
				<i class="fa fa-twitter"></i> 
			</a> 
			
			<a href="https://plus.google.com/share?url=<?php echo get_permalink($post->ID);?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" target="_blank" class="social google-button">
				<i class="fa fa-google-plus"></i> 
			</a> 
	
			<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink($post->ID));?>&media=<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>&description=<?php echo urlencode(str_replace(' ', '%20', get_the_title())); ?>" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;" target="_blank" class="social pinterest-button">
				<i class="fa fa-pinterest"></i> 
			</a> 

		</div>
	
<?php 
	
	} 

	add_action( 'suevafree_socialshare', 'suevafree_social_buttons_function', 10, 2 );

}

?>