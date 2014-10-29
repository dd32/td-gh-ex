<?php
/**
 * Archive pages Template
 */

get_header(); ?>

	<section id="primary" class="site-content">
    
    		 


		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'artikler' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'artikler' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'artikler' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'artikler' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'artikler' ) ) . '</span>' );
					else :
						_e( 'Archives', 'artikler' );
					endif;
				?></h1>
			</header><!-- .archive-header -->

				<?php get_all_posts();


			artikler_theme_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>