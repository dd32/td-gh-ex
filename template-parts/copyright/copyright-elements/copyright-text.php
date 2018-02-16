<?php
$copyright_text = get_theme_mod( atlast_business_get_prefix() . '_copyright_text', '' );
?>
<p>
	<?php
	if ( ! empty( $copyright_text ) ):
		echo esc_html( $copyright_text );
	else:
		echo __( 'Atlast Business Theme', 'atlast-business' ); ?><?php echo __( ' by ', 'atlast-business' ); ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
           title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"><?php echo esc_html__( 'akisthemes.com', 'atlast-business' ); ?>
        </a>
	<?php endif; ?>
</p>