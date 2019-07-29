<?php if ( get_theme_mod( 'apex-business-portfolio-switch-setting', 1 ) ) : ?>
<section class="ct-portfolio-section">
    <div class="container ct-padding">
        <?php if( get_theme_mod( 'apex-business-portfolio-title-setting' ) != '' ) : ?>
        <div class="row">
            <div class="twelve columns">
                <div class="ct-section-wrapper ct-sm-b-padding">
                    <h2 class="ct-text-center ct-section-title ct-portfolio-title"><?php echo esc_html( get_theme_mod( 'apex-business-portfolio-title-setting' ) ); ?></h2><!-- /.ct-text-center -->
                </div><!-- /.ct-section-wrapper ct-sm-b-padding -->
            </div><!-- /.twelve columns -->
        </div><!-- /.row -->
        <?php endif; ?>

        <div class="row ct-portfolio-gallery">
        <?php
            for ( $apex_business_count = 1; $apex_business_count < 9; $apex_business_count++ ) {
                $apex_business_page_title = get_theme_mod( "apex-business-portfolio-setting-$apex_business_count" );

                if ( ! empty( $apex_business_page_title ) ) {
        ?>
            <div class="three columns">
                <div class="ct-portfolio <?php echo esc_attr( "ct-portfolio-sr-$apex_business_count" ); ?>">
                    <div class="ct-container-img">
                        <?php echo get_the_post_thumbnail( $apex_business_page_title, 'apex-business-600-1x1' ); ?>
                    </div><!-- /.ct-container-img -->
                    <div class="ct-overlay">
                        <div class="ct-portfolio-content">
                            <div class="ct-rollover-content">
                                <h2><?php echo esc_html( get_the_title( $apex_business_page_title ) ); ?></h2>
                                <span class="ct-icon-link">
                                    <a href="<?php echo esc_url( get_the_permalink( $apex_business_page_title ) ); ?>"><i class="fa fa-arrow-right circle-icon"></i></a>
                                </span>
                                <span class="ct-icon-link open-lightbox" data-href="<?php echo esc_url(get_the_post_thumbnail_url( $apex_business_page_title ) ); ?>">
                                    <a href="#"><i class="fa fa-search circle-icon"></i></a>
                                </span>
                            </div><!-- /.rollover-content -->
                        </div><!-- /.ct-portfolio-content -->
                    </div><!-- /.ct-overlay -->
               </div><!-- /.ct-portfolio -->
            </div><!-- /.three columns -->
        <?php
                } // End If
            } // End For
        ?>
        </div><!-- /.row -->
    </div><!-- /.ct-portfolio-gallary container -->
</section>
<div class="ct-divider"></div><!-- /.ct-divider -->
<?php endif; ?>
