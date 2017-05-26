<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #container div elements.
 *
 * @package Aguafuerte
 * @since Aguafuerte 1.0.2
 */
?>


</main><!-- #main -->

<?php get_sidebar('footer'); ?>

<footer id="page-footer">
    <div class="inner">
        <div id="site-info">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        <a href="<?php echo esc_url('https://wordpress.org/' ); ?>"><?php echo __( 'Proudly powered by WordPress', 'aguafuerte' ) ; ?></a>
        </div><!--/site-info--> 
        <?php if (has_nav_menu('social')): ?>
            <div id="social" class="social-navigation">
                <?php wp_nav_menu( array(
                                'theme_location' => 'social',
                                'container' => 'false',
                                'menu_id' => 'social-menu',
                                'depth'          => 1,
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>', )); ?>
            </div> <!--/social--> 
        <?php endif ?>
        
    </div> <!--/inner-->
</footer> <!--/footer-->

</div><!-- #container -->

<?php wp_footer(); ?>
</body>
</html>

