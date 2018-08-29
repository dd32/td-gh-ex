<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package  Az_Authority
 */
get_header();

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="col-full">
			
		<?php if ( have_posts() ) :
			?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->
			<?php

			get_template_part( 'loop' );

		else :

			get_template_part( 'content', 'none' );

		endif; ?>
			
		</div>
	</main><!-- #main -->
</div><!-- #primary -->


<?php
do_action( 'azauthority_sidebar' );
get_footer();