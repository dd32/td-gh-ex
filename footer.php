<footer>
	<div class="footer-section">
        <!--/////START FOOTER/////-->
        <div class="main-footer">
            <div class="container">
                <div class="row">
                	<?php if(is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) { ?>
					    <div class="first_footer layout-set">
					        <div class="container">
					            <div class="row">
					                <div class="col-md-3 col-sm-3 col-xs-12"><?php dynamic_sidebar( 'footer-1' ); ?></div>
					                <div class="col-md-3 col-sm-3 col-xs-12"><?php dynamic_sidebar( 'footer-2' ); ?></div>
					                <div class="col-md-3 col-sm-3 col-xs-12"><?php dynamic_sidebar( 'footer-3' ); ?></div>
					                <div class="col-md-3 col-sm-3 col-xs-12"><?php dynamic_sidebar( 'footer-4' ); ?></div>
					            </div>
					        </div>
					    </div>
					 <?php } ?>
                </div>
            </div>
        </div>
        <!--/////END FOOTER/////-->
        <!--/////START SUB-FOOTER/////-->
        <div class="sub-footer">
            <div class="container">
                <div class="sub-copyright-area">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="copyright-section">
                                <h1>
                            	<?php if(get_theme_mod('copyright_area_text') != ""){ 
    			                     echo wp_kses_post(get_theme_mod('copyright_area_text')); 
			                     } 
                                 esc_html_e(' Theme : ','best-classifieds'); ?><a href="<?php echo esc_url('https://fasterthemes.com/wordpress-themes/best-classifieds'); ?>"><?php esc_html_e(' Best Classifieds WordPress Theme','best-classifieds'); ?></a></h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="social-icon-section">
                                <ul>
                            	<?php for ($i = 1; $i <= 5; $i++) : ?>
		                            <?php if (get_theme_mod('best_classifieds_social_icon' . $i) != '' && get_theme_mod('best_classifieds_social_icon_links' . $i) != ''): ?>
		                                <li><a href="<?php echo esc_url(get_theme_mod('best_classifieds_social_icon_links' . $i)); ?>" target="_blank"><i class="fa <?php echo esc_attr(get_theme_mod('best_classifieds_social_icon' . $i)); ?>"></i></a></li>
		                            <?php endif; ?>
		                        <?php endfor; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/////END SUB-FOOTER/////-->
    </div><!-- End-footer-section-->
    
</footer>
<?php wp_footer(); ?>