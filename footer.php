 
            </div><!-- ends from tag #page-content (below nav/header) -->
        </div><!-- .container -->
    </div><!-- .content-wrapper -->
            <footer class="footer-footer container-fluid">
                <div id="inner-footer">

                    <div class="row">
                        <div class="col-sx-12 col-md-4 col-lg-4">
                        <?php if ( is_active_sidebar( 'footer-middle' ) ) { ?>

                        <div class="block">
	                        <?php dynamic_sidebar( 'footer-left' ); ?>
                        </div>

                        <?php } ?>

    		            </div>

    			        <div class="col-sx-12 col-md-4 col-lg-4">

		                <?php if ( is_active_sidebar( 'footer-middle' ) ) { ?>

                        <div class="block">
                    	    <?php dynamic_sidebar( 'footer-middle' ); ?>
                        </div>

                        <?php } ?>

    		            </div>

    			        <div class="col-sx-12 col-md-4 col-lg-4 end">

		                <?php if ( is_active_sidebar( 'footer-right' ) ) { ?>

                        <div class="block">

                            <?php dynamic_sidebar( 'footer-right' ); ?>
                        </div>

                        <?php } ?>

		                </div><div class="clearfix"></div>

                        <nav class="text-center copyright">

                            <div class="col-sx-12 col-md-4">
                                <p><?php _e('Design by ', 'appeal' ); ?>
                                <a href="http://tradesouthwest.com"
                                   title="Tradesouthwest"> TSW=|=</a></p>
                            </div>

                            <div class="col-sx-12 col-md-4">
                                <p class="text-muted"><?php
                                $year   = esc_attr( date( 'Y' ) );
                                printf( __( 'Copyright %s ', 'appeal' ), $year );
                                esc_attr( bloginfo( 'name' ) ); ?></p>
                            </div>

                            <div class="col-sx-12 col-md-4">
                                <p><a href="#"
                                      title="^"
                                      class="btn btn-default">
                                      <?php _e("Top/Pg.", "appeal"); ?></a></p>
                            </div>

                        </nav>
                    </div>

                </div>
            </footer>

    <?php wp_footer(); ?>


</body>
</html>