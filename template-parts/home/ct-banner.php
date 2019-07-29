<?php
    $apex_business_page_title = get_theme_mod( 'apex-business-banner-page-setting' );
    if ( $apex_business_page_title != '' ) {
?>
<div class="ct-banner" style="background-image: url( '<?php echo esc_url( get_the_post_thumbnail_url( $apex_business_page_title, 'full' ) ); ?>' );">
    <div class="ct-overlay"></div><!-- /.ct-overlay -->
    <div class="ct-banner-content ct-text-center">
            <h2 class="ct-banner-title"><?php echo esc_html( get_the_title( $apex_business_page_title ) ); ?></h2>
            <p><?php echo esc_html( get_the_excerpt( $apex_business_page_title ) ); ?></p>
    </div><!-- /.ct-banner-content -->
</div><!-- /.ct-banner -->
<?php } // End if ?>
