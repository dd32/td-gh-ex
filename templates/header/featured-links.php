<div id="featured-links" class="<?php echo esc_attr(ashe_options( 'general_links_width' )) === 'boxed' ? ' boxed-wrapper': ''; ?> clear-fix">

	<!-- Link 1 -->
	<?php if ( ashe_options( 'featured_links_image_1' ) !== '' ): ?>
	<div class="featured-link">
		<img src="<?php echo esc_url( wp_get_attachment_url( ashe_options( 'featured_links_image_1' ) ) ); ?>" alt="Link 1">
		<a href="<?php echo esc_url( ashe_options( 'featured_links_url_1' ) ); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h6><?php echo esc_html( ashe_options( 'featured_links_title_1' ) ); ?></h6>
				</div>
			</div>
		</a>
	</div>
	<?php endif; ?>

	<!-- Link 2 -->
	<?php if ( ashe_options( 'featured_links_image_2' ) !== '' ): ?>
	<div class="featured-link">
		<img src="<?php echo esc_url( wp_get_attachment_url( ashe_options( 'featured_links_image_2' ) ) ); ?>" alt="Link 2">
		<a href="<?php echo esc_url( ashe_options( 'featured_links_url_2' ) ); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h6><?php echo esc_html( ashe_options( 'featured_links_title_2' ) ); ?></h6>
				</div>
			</div>
		</a>
	</div>
	<?php endif; ?>

	<!-- Link 3 -->
	<?php if ( ashe_options( 'featured_links_image_3' ) !== '' ): ?>
	<div class="featured-link">
		<img src="<?php echo esc_url( wp_get_attachment_url( ashe_options( 'featured_links_image_3' ) ) ); ?>" alt="Link 3">
		<a href="<?php echo esc_url( ashe_options( 'featured_links_url_3' ) ); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h6><?php echo esc_html( ashe_options( 'featured_links_title_3' ) ); ?></h6>
				</div>
			</div>
		</a>
	</div>
	<?php endif; ?>

</div><!-- #featured-links -->