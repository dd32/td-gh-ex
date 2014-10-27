<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package ascent
 */

get_header(); ?>

<div class="row">
    <div class="col-sm-12 col-md-12">	
	<?php // add the class "panel" below here to wrap the content-padder in Bootstrap style ;) ?>	
	<section class="content-padder error-404 not-found jumbotron text-center">
	    <header class="page-header">
		<h1 class="title large-text">404</h1>
	    </header><!-- .page-header -->
	    <div class="page-content">
		<h2 class="page-title"><?php _e( 'Oops! Something went wrong here.', 'ascent' ); ?></h2>
		<p><?php _e( 'Nothing could be found at this location.', 'ascent' ); ?></p>
		<p>Try going back to the <a href="<?php echo esc_url(home_url('/')); ?>"><strong><?php _e('Homepage','framework'); ?></strong></a>  instead? </p>
	    </div><!-- .page-content -->
	</section><!-- .content-padder -->
    </div>
    
</div>
<?php get_footer(); ?>