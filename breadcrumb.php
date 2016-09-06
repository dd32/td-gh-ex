<?php
/**
 * The template used for displaying page breadcrumb
 *
 * @package boxy
 */
	 ?>

        <div class="breadcrumb-wrap">
	<div class="container">
		<div class="sixteen columns">
	        <header class="entry-header ten columns">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->
			<div class="breadcrumb six columns">
				<?php $breadcrumb = get_theme_mod( 'breadcrumb' );
		if ( get_theme_mod('breadcrumb' ) && function_exists( 'boxy_breadcrumbs' ) ) : ?>
			<div id="breadcrumb" role="navigation">
				<?php boxy_breadcrumbs(); ?>
		    </div>
        <?php endif; ?> 
			</div>
		</div>
	</div>
</div>