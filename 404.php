<?php get_header(); ?>

<!-- start content container -->
<div class="main-content row">
	<div class="col-md-<?php bestore_main_content_width_columns(); ?>">
		<div class="main-content-page">
			<div class="error-template text-center">
				<h1><?php esc_html_e( 'Oops!', 'bestore' ); ?></h1>
				<h2><?php esc_html_e( '404 Not Found', 'bestore' ); ?></h2>
				<p class="error-details">
					<?php esc_html_e( 'Sorry, an error has occured, Requested page not found!', 'bestore' ); ?>
				</p>
				<div class="error-actions">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-default"><?php esc_html_e( 'Take Me Home', 'bestore' ); ?></a>    
				</div>
			</div>
		</div>
	</div>

	<?php get_sidebar( 'right' ); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>
