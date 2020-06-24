<?php /* Template Name: 404 */ ?>
<?php get_header(); ?>
	<section class="esection error"> 
	    <div class="father-col clearfix">
	        <h1 class="archive-title"><?php esc_html_e( '404! Page Not Found', 'baena' ); ?></h1>
			<p class="archive-subtitle"><?php esc_html_e( 'Oops, the page you are looking for is not available', 'baena' ); ?></p>
			<a class="boton" href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e( 'Go back to start', 'baena' ); ?></a>
		</div><!--.father-col clearfix"-->
	</section><!--.esection error-->
<?php get_footer(); ?>