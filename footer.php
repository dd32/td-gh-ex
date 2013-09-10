<?php if(!defined('ABSPATH')) exit; //Exit if accessed directly
	footer_social_icons();
	if(is_active_sidebar('footer_1') || is_active_sidebar('footer_2') || is_active_sidebar('footer_3') || is_active_sidebar('footer_4')) : ?>
        <!-- Footer -->
        <div id="footer">
            <div class="row">
                <div class="col width-25">
                    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_1')) : endif; ?> 
                </div>
                <div class="col width-25">
                    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_2')) : endif; ?> 
                </div>
                <div class="col width-25">
                    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_3')) : endif; ?> 
                </div>
                <div class="col width-25 last">
                    <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer_4')) : endif; ?> 
                </div>
            </div>
        </div>
        <!-- Footer end -->
    <?php endif; ?>
	<!-- Bottom -->
    <div id="bottom">
		<div class="row">
            <div class="col width-50">
            	<div id="credits">Powered by <a href="http://wordpress.org/">WordPress</a>, theme by <a href="http://drewdyer.co.uk/">Drew Dyer</a>.</div>
            </div>
            <div class="col width-10"><a href="#" id="gototop" >&uarr;</a></div>
            <div class="col width-40 last">
            	<div id="disclaimer"><?php get_disclaimer(); ?></div>
            </div>
		</div>
    </div>
	<!-- Bottom end -->
</div>
<?php wp_footer(); ?>
</body>
</html>
