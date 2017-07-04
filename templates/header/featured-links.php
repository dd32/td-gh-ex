<div id="featured-links" class="<?php echo ashe_options( 'general_content_width' ) === 'boxed' ? ' boxed-wrapper': ''; ?>">
	
	<div class="boxed-wrapper clear-fix">

	<?php

	// Featured Links section Title
	if ( ashe_options( 'featured_links_sec_title' ) !== '' ) {
		echo '<h1>'. esc_html( ashe_options( 'featured_links_sec_title' ) ) .'</h1>';
	}

	// Open Links in New Tab
	$links_window = ( ashe_options( 'featured_links_window' ) === true )?'_blank':'_self';

	?>

	<!-- Link 1 -->
	<?php if ( ashe_options( 'featured_links_image_1' ) !== '' ): ?>
	<div class="featured-link">
		<img src="<?php echo esc_url( wp_get_attachment_url( ashe_options( 'featured_links_image_1' ) ) ); ?>" alt="Link 1">
		<a href="<?php echo esc_url( ashe_options( 'featured_links_url_1' ) ); ?>" target="<?php echo esc_attr($links_window); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h4><?php echo esc_attr( ashe_options( 'featured_links_title_1' ) ); ?></h4>
				</div>
			</div>
		</a>
	</div>
	<?php endif; ?>

	<!-- Link 2 -->
	<?php if ( ashe_options( 'featured_links_image_2' ) !== '' ): ?>
	<div class="featured-link">
		<img src="<?php echo esc_url( wp_get_attachment_url( ashe_options( 'featured_links_image_2' ) ) ); ?>" alt="Link 2">
		<a href="<?php echo esc_url( ashe_options( 'featured_links_url_2' ) ); ?>" target="<?php echo esc_attr($links_window); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h4><?php echo esc_attr( ashe_options( 'featured_links_title_2' ) ); ?></h4>
				</div>
			</div>
		</a>
	</div>
	<?php endif; ?>

	<!-- Link 3 -->
	<?php if ( ashe_options( 'featured_links_image_3' ) !== '' ): ?>
	<div class="featured-link">
		<img src="<?php echo esc_url( wp_get_attachment_url( ashe_options( 'featured_links_image_3' ) ) ); ?>" alt="Link 3">
		<a href="<?php echo esc_url( ashe_options( 'featured_links_url_3' ) ); ?>" target="<?php echo esc_attr($links_window); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h4><?php echo esc_attr( ashe_options( 'featured_links_title_3' ) ); ?></h4>
				</div>
			</div>
		</a>
	</div>
	<?php endif; ?>

	<!-- Link 4 -->
	<?php if ( ashe_options( 'featured_links_image_4' ) !== '' ): ?>
	<div class="featured-link">
		<img src="<?php echo esc_url( wp_get_attachment_url( ashe_options( 'featured_links_image_4' ) ) ); ?>" alt="Link 4">
		<a href="<?php echo esc_url( ashe_options( 'featured_links_url_4' ) ); ?>" target="<?php echo esc_attr($links_window); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h4><?php echo esc_attr( ashe_options( 'featured_links_title_4' ) ); ?></h4>
				</div>
			</div>
		</a>
	</div>
	<?php endif; ?>

	<!-- Link 5 -->
	<?php if ( ashe_options( 'featured_links_image_5' ) !== '' ): ?>
	<div class="featured-link">
		<img src="<?php echo esc_url( wp_get_attachment_url( ashe_options( 'featured_links_image_5' ) ) ); ?>" alt="Link 5">
		<a href="<?php echo esc_url( ashe_options( 'featured_links_url_5' ) ); ?>" target="<?php echo esc_attr($links_window); ?>">
			<div class="cv-outer">
				<div class="cv-inner">
					<h4><?php echo esc_attr( ashe_options( 'featured_links_title_5' ) ); ?></h4>
				</div>
			</div>
		</a>
	</div>
	<?php endif; ?>

	</div><!-- .boxed-wrapper -->

</div><!-- #featured-links -->