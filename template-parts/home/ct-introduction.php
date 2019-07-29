<?php
    if ( get_theme_mod( 'apex-business-introduction-switch-setting', 1 ) ) :
        $apex_business_page_title = get_theme_mod( 'apex-business-introduction-page-setting' );
        if ( $apex_business_page_title != '' ) :
?>
<section id="ct-intro-prime">
    <div class="container ct-padding">
        <div class="row">
            <div class="six columns ct-left-margin">
                <h2 class="ct-intro-prime-title ct-section-title ct-st-left"><?php echo esc_html( get_the_title( $apex_business_page_title ) ); ?></h2><!-- /.ct-intro-prime-title -->

                <p class="ct-excerpt"><?php echo esc_html( get_the_excerpt( $apex_business_page_title ) );?></p>

                <a href="<?php echo esc_url( get_the_permalink( $apex_business_page_title ) ); ?>" class="ct-read-more"><?php _e( 'Read More', 'apex-business' ); ?></a><!-- /.ct-read-more -->
            </div><!-- /.six columns -->
            <div class="six columns">
                <div class="ct-container-img">
                    <?php echo get_the_post_thumbnail( $apex_business_page_title, 'full' ); ?>
                </div><!-- /.ct-container-img -->
            </div><!-- /.six columns -->
        </div><!-- /.row -->
    </div><!-- /.ct-intro-prime container -->
</section>
<div class="ct-divider"></div><!-- /.ct-divider -->
<?php
        endif;
    endif;
?>
