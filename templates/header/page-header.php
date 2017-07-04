<?php if ( ashe_options('page_header_label') === true ) : ?>

	<div class="entry-header">
		
		<div class="header-logo">
			<a href="<?php echo esc_url(home_url('/')); ?>">

				<!-- Logo -->
				<?php if ( ashe_options( 'page_header_logo' ) !== '' ) : ?>
				<img src="<?php echo esc_url(ashe_options( 'page_header_logo' )); ?>" alt="Logo">
				<?php endif; ?>

				<!-- Tagline -->
				<?php if ( ashe_options( 'page_header_show_tagline' ) ) : ?>
				<p class="site-description image-overlay"><?php bloginfo( 'description' ); ?></p>
				<?php endif; ?>

			</a>
		</div>
		
	</div>

<?php endif; ?>