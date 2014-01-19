<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Blue Sky
 */
?>
<?php
global $bluesky_options_settings;
$bs_options = $bluesky_options_settings;
?>
    <?php
    //
    do_action( 'bluesky_before_content_close' );
    //
    ?>
	</div><!-- #content -->
    <div class="clear"></div>
    <?php
    //
    do_action( 'bluesky_after_content_close' );
    //
    ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
    <?php
    //
    do_action( 'bluesky_after_footer_open' );
    //
    ?>
		<div class="site-info">
            <?php
                            wp_nav_menu( array(
                                'menu'              => 'footer',
                                'theme_location'    => 'footer',
                                'depth'             => 1,
                                'container'         => 'div',
                                'container_class'   => 'footer-nav-wrapper',
                                'menu_class'        => 'footer-nav',
                                'fallback_cb'        => '',
                                'link_after'        => '<span class="pipe">|</span>',
                                )
                            );
                        ?>
			<?php do_action( 'bluesky_credits' ); ?>

		</div><!-- .site-info -->

        <?php
        //
        do_action( 'bluesky_before_footer_close' );
        //
        ?>
	</footer><!-- #colophon -->
<div class="footer-end-page">
<?php
//
do_action( 'bluesky_before_page_close' );
//
?>
</div> <!-- .footer-end-page -->
</div><!-- #page -->
<?php
//
do_action( 'bluesky_before_container_close' );
//
?>
</div> <!-- // .container -->
<?php wp_footer(); ?>

</body>
</html>
