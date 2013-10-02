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

function wip_social_buttons_function() { 

	global $post;

?>

    <script type='text/javascript' src='https://apis.google.com/js/plusone.js?ver=3.4.2'></script>
    
    <div id="fb-root"></div>
    
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/<?php echo __( "en_EN","wip"); ?>/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    
    
    <div class="social-icons">
            
        <div class="social-button facebook-box <?php echo __( "en","wip"); ?>">
              
            <div class="fb-like" data-href="<?php echo get_permalink($post->ID);?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="true"></div>
    
        </div>
    
        <div class="social-button twitter-box">
                
            <a href="https://twitter.com/share" data-counturl="<?php echo get_permalink($post->ID);?>" data-url="<?php echo get_permalink($post->ID);?>" class="twitter-share-button" data-lang="<?php echo __( "en","wip"); ?>" data-dnt="true" data-text="<?php echo get_the_title(); ?>">Tweet</a>
                
        </div>
    
        <div class="social-button google-plus">
                
            <div class="g-plusone" data-size="medium" data-href="<?php echo get_permalink($post->ID);?>"></div>
                    
        </div>
        

        <div class="social-button pinterest">
			
			<?php printf( '<div class="pinterest-posts"><a href="http://pinterest.com/pin/create/button/?url=%s&amp;media=%s" class="pin-it-button" >Pin It</a><script type="text/javascript" src="http://assets.pinterest.com/js/pinit.js"></script></div>', urlencode(get_permalink()), urlencode( get_post_meta($post->ID, 'blog', true) ) ); ?>
                    
        </div>
                
    </div>    
    
    <div class="clear"></div>

<?php 

} 

add_action( 'wip_social_buttons', 'wip_social_buttons_function', 10, 2 );

?>