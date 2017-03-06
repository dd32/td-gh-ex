<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #container div elements.
 *
 * @package Bassist
 * @since Bassist 1.0.0
 */
?>


</main><!-- #main -->

<footer id="page-footer" role="contentinfo">
    <div class="inner">
        <div id="site-info">
        <span class="footer-site-title"> &copy <?php echo date('Y') ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
        
        <a href="<?php echo esc_url('https://wordpress.org/' ); ?>"><?php printf( __( 'Proudly powered by', 'bassist' ).' %s', 'WordPress' ); ?></a>
        </div><!--/site-info-->
        
        <?php if (has_nav_menu('social')): ?>
            <nav id="footer-social-navigation" class="site-navigation social-navigation" role="navigation" aria-label='<?php _e( 'Social Menu ', 'bassist' ); ?>' >
                <?php wp_nav_menu( array(
                                'theme_location' => 'social',
                                'container' => 'ul',
                                'menu_id' => 'footer-social-menu',
                                'depth'          => 1,
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>', )); ?>
            </nav> <!--/social--> 
        <?php endif ?>
        
    </div> <!--/inner-->
</footer> <!--/footer-->

</div><!-- #container -->

<?php wp_footer(); ?>
</body>
</html>
