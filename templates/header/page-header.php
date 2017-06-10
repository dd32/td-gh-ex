<?php if ( ashe_options('page_header_label') === true ) : ?>


	<?php
	$header_image = ashe_options( 'page_header_bg_image' );
	$header_image = ashe_options( 'page_header_bg_image' );
	$header_logo = 'yes';


	if ( is_single() ) {
		if ( get_field( 'show_post_header' ) === 'no' ) {
			return;
		}

		if ( get_field( 'upload_custom_post_header_image' ) != '' ) {
			$header_image = get_field( 'upload_custom_post_header_image' );
		}

		$header_logo = get_field( 'show_post_header_logo' );
	}

	if ( is_category() ) {

		$category = get_category( get_query_var( 'cat' ) );
		$cat_id = $category->cat_ID;

		if ( get_field( 'show_category_header', 'category_'. $cat_id ) === 'no' ) {
			return;
		}

		if ( get_field( 'upload_custom_cat_header_image', 'category_'. $cat_id ) != '' ) {
			$header_image = get_field( 'upload_custom_cat_header_image', 'category_'. $cat_id );
		}

		$header_logo = get_field( 'show_category_logo', 'category_'. $cat_id );
	}

	if ( is_page() ) {

		if ( get_field( 'show_page_header' ) === 'no' ) {
			return;
		}

		if ( get_field( 'upload_custom_page_header_image' ) != '' ) {
			$header_image = get_field( 'upload_custom_page_header_image' );
		}

		$header_logo = get_field( 'show_page_logo' );
	}


	
	?>



<div class="entry-header" style="background-image:url(<?php echo esc_url( $header_image ); ?>)/*MOD*/" data-parallax="<?php echo esc_attr(ashe_options( 'page_header_parallax' )); ?>" data-paroller-factor="0.5">
	
	<?php if ( $header_logo === 'yes' ) : ?>
	<div class="header-logo">
		<a href="<?php echo esc_url(home_url('/')); ?>">

			<!-- Logo -->
			<?php if ( ashe_options( 'page_header_logo' ) !== '' ) : ?>
			<img src="<?php echo esc_url(ashe_options( 'page_header_logo' )); ?>" alt="Logo">
			<?php endif; ?>

			<!-- Tagline -->
			<?php if ( ashe_options( 'page_header_show_tagline' ) ) : ?>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
			<?php endif; ?>

		</a>
	</div>
	<?php endif; ?>
	
</div><!-- .entry-header -->
<?php endif; ?>