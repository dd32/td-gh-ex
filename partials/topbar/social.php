<?php

// social media options array
$bam_social_options = bam_social_options();

// topbar social media style.
$bam_topbar_social_style = get_theme_mod( 'bam_topbar_social_style', 'colored' );

?>

<div class="bam-topbar-social <?php echo esc_attr( $bam_topbar_social_style ); ?>">

    <?php foreach ( $bam_social_options as $key => $value ) { ?>

        <?php $bam_social_link = get_theme_mod( 'bam_social_profile_'. $key, '' ); ?>

        <?php if ( ! empty( $bam_social_link ) ) : ?>
            <span class="bam-social-icon">
                <a href="<?php echo esc_url( $bam_social_link ); ?>" class="bam-social-link <?php echo esc_attr( $key ); ?>" target="_blank" title="<?php esc_attr( $value[ 'label' ] ); ?>">
                    <i class="<?php echo esc_attr( $value[ 'icon_class' ] ); ?>"></i>
                </a>
            </span>
        <?php endif; ?>
        
    <?php } ?>

</div><!-- .bam-social-media -->