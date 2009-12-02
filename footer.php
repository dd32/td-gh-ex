<div class="clear"></div>

</div>

<div id="footerbg">
    <div id="footer">
		<div class="footerleft">
        	<p><a class="footer-arrow" rel="nofollow" href="#top" ><?php _e("Return to top of page", 'studiopress'); ?></a></p>
        </div>
        <div class="footerright">
        	<p><a class="footer-rss" rel="nofollow" href="<?php bloginfo('rss_url'); ?>"><?php _e("Posts", 'studiopress'); ?></a>
			<a class="footer-rss" rel="nofollow" href="<?php bloginfo('comments_rss2_url'); ?>"><?php _e("Comments", 'studiopress'); ?></a> &middot; <?php wp_loginout(); ?> &middot; <?php _e("Powered by", 'studiopress'); ?> <a href="http://www.wordpress.org">WordPress</a><br /><?php _e("Copyright", 'studiopress'); ?> &copy; <?php echo date('Y'); ?> &middot; <?php _e("All Rights Reserved", 'studiopress'); ?> &middot; <a href="http://www.studiopress.com/themes/bahama" >Bahama Theme</a> <?php _e("by", 'studiopress'); ?> <a href="http://www.studiopress.com" >StudioPress</a></p>
        </div>
		<?php if(sp_get_option('analytics') == 'Yes') { ?>
            <?php sp_option('analytics_code'); ?>
        <?php } else { ?>
        <?php } ?> 
    <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>

<?php do_action('wp_footer'); ?>

</body>
</html>