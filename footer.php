<?php
/*
 * Template for displaying footer.
 * 
 * @package Afford
 */
?>
<?php get_sidebar('footer') ?>

            <div class="footer-bg-section clearfix">
                <div id="footer-section" class="footer-section">
                    <div id="copyright" class="copyright"><?php _e( 'Copyright', 'afford' ) ?> &#169; <?php echo date( 'Y' ) ?> | <?php _e( 'Powered by', 'afford' ) ?> <a href="http://www.wordpress.org">WordPress</a> | <?php _e( 'Afford theme by', 'afford' ) ?> <a href="http://www.mudthemes.com/" target="_blank">mudThemes</a></div>
                    <?php  afford_social_section_show() ?>
                </div>
            </div>
        </div><!-- wrapper ends -->
    </div><!-- parent-wrapper ends -->
    <?php wp_footer(); ?>
</body>
</html>