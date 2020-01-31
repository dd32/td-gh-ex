</div><!-- end content wrap -->

<footer class="full-width-container primary-footer" id="primary-footer">
    <div class="container">
        <?php if ( is_active_sidebar( 'footer-widget-left' ) || is_active_sidebar( 'footer-widget-right' ) ) : ?>
            <div class="row footer-top">
                <?php if( is_active_sidebar( 'footer-widget-left' ) ) { ?>
                    <div class="col-md-6">
                        <?php dynamic_sidebar( 'Footer Left Widget' );  ?>
                    </div>
                <?php } ?>
                <?php if ( is_active_sidebar( 'footer-widget-right' ) ) { ?>
                    <div class="col-md-6">
                        <?php dynamic_sidebar( 'Footer Right Widget' );  ?>
                    </div>
                <?php } ?>
            </div><!-- end row -->
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12 aligncenter footer-bottom">
                <p><?php
                    if ( get_theme_mod( 'footer_copyright') ) {
                        echo html_entity_decode(get_theme_mod( 'footer_copyright'));
                    } else {
                        echo '&copy; '.date("Y") . ' ' . get_bloginfo() . '. WordPress Theme - ' . 'atwood';
                        if ( is_home() ) {
                             echo ' by <a href="http://themeora.com">Themeora</a>';
                        }
                        else {
                            echo ' by Themeora';
                        }
                    }?>
                </p>
            </div>
        </div>
    </div><!-- end container -->
</footer><!-- end full-width-container -->


</div><!-- end page wrapper -->

<?php wp_footer(); ?>

</body>
</html>
