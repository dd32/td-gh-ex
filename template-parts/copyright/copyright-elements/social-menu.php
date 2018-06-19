<ul class="social-menu">
	<?php
	$prefix = atlast_business_get_prefix();
	$fb     = get_theme_mod( $prefix . '_facebook', '' );
	$tw     = get_theme_mod( $prefix . '_twitter', '' );
	$gp     = get_theme_mod( $prefix . '_google-plus', '' );
	$ln     = get_theme_mod( $prefix . '_linkedin', '' );
	$in     = get_theme_mod( $prefix . '_instagram', '' );
	$yt     = get_theme_mod( $prefix . '_youtube', '' );
	$vm     = get_theme_mod( $prefix . '_vimeo', '' );
	?>

	<?php if ( ! empty( $fb ) ): ?>
        <li><a href="<?php echo esc_url( $fb ); ?>"
               title="<?php echo esc_attr__( 'Visit us on Facebook', 'atlast-business' ); ?>">
                <span class="fab fa-facebook"></span>
            </a>
        </li>
	<?php endif; ?>
	<?php if ( ! empty( $tw ) ): ?>
        <li><a href="<?php echo esc_url( $tw ); ?>"
               title="<?php echo esc_attr__( 'Follow us on Twitter', 'atlast-business' ); ?>"> <span
                        class="fab fa-twitter"></span></a></li>
	<?php endif; ?>
	<?php if ( ! empty( $gp ) ): ?>
        <li><a href="<?php echo esc_url( $gp ); ?>"
               title="<?php echo esc_attr__( 'View our Google+ profile', 'atlast-business' ); ?>"><span
                        class="fab fa-google-plus"></span></a></li>
	<?php endif; ?>

	<?php if ( ! empty( $ln ) ): ?>
        <li><a href="<?php echo esc_url( $ln ); ?>"
               title="<?php echo esc_attr__( 'View our Linkedin profile', 'atlast-business' ); ?>"><span
                        class="fab fa-linkedin"></span></a></li>
	<?php endif; ?>
	<?php if ( ! empty( $in ) ): ?>
        <li><a href="<?php echo esc_url($in); ?>" title="<?php echo esc_attr__( 'Follow us on Instagram', 'atlast-business' ); ?>"><span
                        class="fab fa-instagram"></span></a></li>
	<?php endif; ?>

	<?php if ( ! empty( $yt ) ): ?>
        <li><a href="<?php echo esc_url($yt); ?>" title="<?php echo esc_attr__( 'Visit our Youtube Page', 'atlast-business' ); ?>"><span
                        class="fab fa-youtube"></span></a></li>
	<?php endif; ?>

	<?php if ( ! empty( $vm) ): ?>
        <li><a href="<?php echo esc_url($vm); ?>" title="<?php echo esc_attr__( 'Follow us on Vimeo', 'atlast-business' ); ?>"><span
                        class="fab fa-vimeo"></span></a></li>
	<?php endif; ?>
</ul>