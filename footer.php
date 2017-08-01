
            </div><!-- ends from tag #page-content (below nav/header) -->
        </div><!-- .container -->

<div class="container">
    <div class="row">
    
        <?php if( is_active_sidebar( 'sidebar-bottom' ) ) { ?>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bottombox">
    
        <?php get_sidebar( 'bottom' ); ?>
    
    </div>

        <?php } ?>
    </div>
</div>

    </div><!-- .content-wrapper -->
            <footer class="footer-footer container-fluid">
        <nav class="social-footer">
            <?php if ( has_nav_menu( 'above_footer' ) ) {
                    wp_nav_menu( array(
                    'menu'               => 'above_footer',
                    'theme_location'    => 'above_footer',
                    'container'        => 'ul',
                    'container_class' => 'list-inline',
                    'container_id'   => 'above_footer',
                    'fallback_cb'   => 'wp_page_menu',
                    'menu_class'   => 'nav navbar-nav'));
             } ?>
        </nav>
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
                                <p><?php esc_html_e('Design by ', 'appeal' ); ?>
                                <a href="http://tradesouthwest.com"
                                   title="Tradesouthwest"> TSW=|=</a></p>
                            </div>

                            <div class="col-sx-12 col-md-4">
                                <p class="text-muted"><?php
                                $year   = date( 'Y' );
                                esc_attr_e( 'Copyright ', 'appeal' ); 
                                echo esc_attr( $year ) . ' ';
                                printf( esc_attr( bloginfo( 'name' ) ) ); ?></p>
                            </div>

                            <div class="col-sx-12 col-md-4">
                                <p><a href="#"
                                      title="^"
                                      class="btn btn-default">
                                      <?php esc_attr_e("Top/Pg.", "appeal"); ?></a></p>
                            </div>

                        </nav>
                    </div>

                </div>
            </footer>

    <?php wp_footer(); ?>


</body>
</html>
