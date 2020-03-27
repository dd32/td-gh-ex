<?php /* Template Name: 404 */ ?>
<?php get_header(); ?>
	<section class="ejemplo-section error"> 
	    <div class="padre-col clearfix">
	        <h1>404!</h1>
			<p class="archive-title"><?php esc_html_e( 'Oops, the page you are looking for is not available', 'baena' ); ?></p>
			<a class="boton" href="<?php echo home_url(); ?>">Go back to start</a>
		</div><!--.padre-col clearfix"-->
	</section><!--.ejemplo-section error-->
<?php get_footer(); ?>