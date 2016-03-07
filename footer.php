<?php
/*
 * Template for displaying footer.
 * 
 * @package Actuate
 */
?>
<?php get_sidebar('footer') ?>

            <?php if(!actuate_get_option('disable_footer')): ?>
            <div class="footer-bg-section clearfix">
                <div id="footer-section" class="footer-section">
                    <?php if(actuate_get_option('show_copyright')): ?>
                        <div id="copyright" class="copyright"><?php _e( 'Copyright', 'actuate' ) ?> &#169; <?php echo date( 'Y' ) ?> <?php if( actuate_get_option('footer_name') ) { echo esc_html( actuate_get_option('footer_name') ); } ?> | <a href="http://www.wordpress.org"><?php _e( 'Powered by WordPress', 'actuate' ) ?></a> | <?php _e( 'Actuate Theme by', 'actuate' ) ?> <a href="http://www.mudthemes.com/" target="_blank">mudThemes</a></div>
                    <?php endif ?>
                        <?php  actuate_social_section_show() ?>
                </div>
            </div>
            <?php endif; ?>
        </div><!-- wrapper ends -->
    </div><!-- parent-wrapper ends -->
    <?php wp_footer(); ?>
</body>
</html>