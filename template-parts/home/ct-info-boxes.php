<?php if ( get_theme_mod( 'apex-business-info-boxes-switch-setting', 1 ) ) : ?>
<div class="ct-blurb-container container ct-padding">
    <div class="row">

        <?php
            for ( $apex_business_count = 1; $apex_business_count < 4; $apex_business_count++ ) {
                $apex_business_page_title = get_theme_mod( "apex-business-info-boxes-setting-$apex_business_count" );

                if ( ! empty( $apex_business_page_title ) ) {
        ?>

        <div class="four columns">
            <div class="ct-blurb-prime">
                <div class="ct-blurb-prime-icon">
                    <span class="fa <?php echo esc_attr( get_theme_mod( "apex-business-info-boxes-icon-setting-$apex_business_count" , 'fa-globe') ); ?> fa-gradient"></span>
                </div><!-- /.ct-blurb-prime-icon -->

                <div class="ct-blurb-prime-content">
                    <h2 class="ct-blurb-prime-title <?php echo esc_attr( "blurb-title-$apex_business_count" ); ?>"><?php echo esc_html( get_the_title( $apex_business_page_title ) ); ?></h2>

                    <p><?php echo esc_html( get_the_excerpt( $apex_business_page_title ) ); ?></p>

                    <a href="<?php echo esc_url( get_the_permalink( $apex_business_page_title ) ); ?>" class="ct-read-more"><?php _e( 'Read More', 'apex-business' ); ?></a><!-- /.ct-read-more -->
                </div><!-- /.ct-blurb-prime-content -->
            </div><!-- /.ct-blurb-prime -->
        </div><!-- /.four columns -->

        <?php
                } // End If
            } // End For
        ?>

    </div><!-- /.row -->
</div><!-- /.ct-blurb-container container -->
<div class="ct-divider"></div><!-- /.ct-divider -->
<?php endif; ?>
