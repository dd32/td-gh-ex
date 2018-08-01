<?php
$copyright_text = get_theme_mod( atlast_agency_get_prefix() . '_copyright_text', '' );
?>
<p>
	<?php
	if ( ! empty( $copyright_text ) ):
		echo esc_html( $copyright_text );
	else:
		echo __( 'Atlast Agency WordPress Theme' , 'atlast-agency'); ?><?php echo __( ' by ', 'atlast-agency'); ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
           title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php echo esc_html__( 'akisthemes.com', 'atlast-agency'); ?>
        </a>
	<?php endif; ?>
</p>