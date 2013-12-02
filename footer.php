    	<?php if(is_active_sidebar('footer-widgets') || has_nav_menu('footer-menu', 'autoadjust')) : ?>
            <!-- FOOTER -->
            <div id="footer">
            	<?php if(is_active_sidebar('footer-widgets')) : ?>
                    <div class="container row">
                        <?php if(is_active_sidebar('footer-widgets')) : dynamic_sidebar('footer-widgets'); endif; ?>
                    </div>
                <?php endif;
                if(has_nav_menu('footer-menu', 'autoadjust')) : ?>
                    <!-- FOOTER MENU -->
                    <div class="container row">
                        <?php wp_nav_menu(array(
                            'container'			=> false,
                            'fallback_cb'		=> false,
                            'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'menu_id'			=> 'footer-menu',
                            'menu_class'		=> 'horizontal-aligned-menu last col width-100',
                            'theme_location'	=> 'footer-menu'
                        )); ?>
                    </div>
                    <!-- FOOTER MENU END -->
                <?php endif; ?>
            </div>
            <!-- FOOTER END -->
		<?php endif;
        if(has_nav_menu('bottom-menu', 'autoadjust')) : ?>        
            <!-- BOTTOM -->
            <div id="bottom">
                <div class="container row">
                    <?php wp_nav_menu(array(
                        'container'			=> false,
                        'fallback_cb'		=> false,
                        'items_wrap'		=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'menu_id'			=> 'bottom-menu',
						'menu_class'		=> 'horizontal-aligned-menu col width-60',
                        'theme_location'	=> 'bottom-menu'
                    )); ?>
                    <div class="last col width-40">
                    	<div class="legal">Powered by <strong><a href="http://wordpress.org">WordPress</a></strong>, Theme by <strong><a href="http://drewdyer.co.uk">Drew Dyer</a></strong></div>
                    </div>
                </div>
            </div>
            <!-- BOTTOM END -->
        <?php endif; ?>
    </div>
</div>
<!-- CONTAINER END -->
<?php wp_footer(); ?>
</body>
</html>