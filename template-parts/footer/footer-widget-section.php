<?php if ( is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' )  || is_active_sidebar( 'footer-3' ) ) : ?>
    <div id="footer-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <?php dynamic_sidebar( 'footer-1' ); ?>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <?php dynamic_sidebar( 'footer-2' ); ?>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <?php dynamic_sidebar( 'footer-3' ); ?>
                </div>
            </div>
        </div>
    </div><!-- #footer-inner -->
<?php endif; ?>