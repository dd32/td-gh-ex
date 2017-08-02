<?php if ( ashe_options('header_image_label') === true ) : ?>

	<div class="entry-header">
		<div class="cv-container">
		<div class="cv-outer">
		<div class="cv-inner">
			<div class="header-logo">
				
				<?php // Logo & Tagline
				$custom_logo_id = get_theme_mod( 'custom_logo' );
				$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );

				if ( function_exists( 'the_custom_logo' ) && isset( $image[0] ) ) :
					the_custom_logo();
				else :
				?>

				<a href="<?php echo esc_url(home_url('/')); ?>">
					<?php echo bloginfo( 'title' ); ?>
				</a>
				<?php endif; ?>

				<?php if ( display_header_text() ) : ?>
				<br>
				<p class="site-description"><?php echo bloginfo( 'description' ); ?></p>
				<?php endif; ?>
				
			</div>
		</div>
		</div>
		</div>
	</div>

<?php endif; ?>