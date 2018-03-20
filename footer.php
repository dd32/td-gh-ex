<div class="footer_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="footer">
                <?php
                /* A sidebar in the footer? Yep. You can can customize
                 * your footer with four columns of widgets.
                 */
                get_sidebar('footer');
                ?>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div class="bottom_footer_container">
    <div class="container_24">
        <div class="grid_24">
            <div class="bottom_footer_content">
                <div class="grid_12 alpha">
                    <div class="copyrightinfo">  
                        <p class="copyright"><a href="<?php echo esc_url('https://www.inkthemes.com/market/appointway-wordpress-theme/'); ?>" rel="nofollow">Appointway Theme</a> Powered By <a href="http://www.wordpress.org">WordPress</a></p><span class="blog-desc"> - 
                            <?php echo get_bloginfo('title'); ?>
                            <?php echo get_bloginfo('description'); ?>
                        </span>
                    </div>
                </div>
                <div class="grid_12 omega">
                    <ul class="social_logos">    
                        <?php if (appointway_get_option('appointway_twitter') != '') { ?>
                            <li><a href="<?php echo esc_url(appointway_get_option('appointway_twitter')); ?>" title="Twitter"><img src="<?php echo get_template_directory_uri(); ?>/images/tw.png" alt="Twitter" /></a>
                            </li>
                        <?php } ?>
                        <?php if (appointway_get_option('appointway_facebook') != '') { ?>
                            <li><a href="<?php echo esc_url(appointway_get_option('appointway_facebook')); ?>" title="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/images/fb.png" alt="Facebook" /></a></li>
                        <?php } ?>     
                        <?php if (appointway_get_option('appointway_rss') != '') { ?>
                            <li><a href="<?php echo esc_url(appointway_get_option('appointway_rss')); ?>" title="RSS Feed"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="Rss Feed" /></a></li>
                        <?php } ?>                
                        <?php if (appointway_get_option('appointway_google') != '') { ?>
                            <li><a href="<?php echo esc_url(appointway_get_option('appointway_google')); ?>" title="Google +"><img src="<?php echo get_template_directory_uri(); ?>/images/gp.png" alt="Google Plus" /></a></li>
                        <?php } ?>  
                        <?php if (appointway_get_option('appointway_linkdin') != '') { ?>
                            <li><a href="<?php echo esc_url(appointway_get_option('appointway_linkdin')); ?>" title="LinkedIn"><img src="<?php echo get_template_directory_uri(); ?>/images/ln.png" alt="LinkedIn" /></a></li>
                        <?php } ?> 
                        <?php if (appointway_get_option('appointway_instagram') != '') { ?>
                            <li><a href="<?php echo esc_url(appointway_get_option('appointway_instagram')); ?>" title="Instagram"><img src="<?php echo get_template_directory_uri(); ?>/images/Instagram.png" alt="Instagram" /></a></li>
                        <?php } ?>
                        <?php if (appointway_get_option('appointway_pinterest') != '') { ?>
                            <li><a href="<?php echo esc_url(appointway_get_option('appointway_pinterest')); ?>" title="pinterest"><img src="<?php echo get_template_directory_uri(); ?>/images/pinterest.png" alt="pinterest" /></a></li>
                        <?php } ?> 
                        <?php if (appointway_get_option('appointway_youtube') != '') { ?>
                            <li><a href="<?php echo esc_url(appointway_get_option('appointway_youtube')); ?>" title="Youtube"><img src="<?php echo get_template_directory_uri(); ?>/images/youtube.png" alt="Youtube" /></a></li>
                        <?php } ?> 
                        <?php if (appointway_get_option('appointway_tumblr') != '') { ?>
                            <li><a href="<?php echo esc_url(appointway_get_option('appointway_tumblr')); ?>" title="Tumblr"><img src="<?php echo get_template_directory_uri(); ?>/images/tumblr.png" alt="Tumblr" /></a></li>
                        <?php } ?> 
                        <?php if (appointway_get_option('appointway_flickr') != '') { ?>
                            <li><a href="<?php echo esc_url(appointway_get_option('appointway_flickr')); ?>" title="Flickr"><img src="<?php echo get_template_directory_uri(); ?>/images/flickr.png" alt="Flickr" /></a></li>
                        <?php } ?> 
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>
