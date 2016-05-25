<?php get_header(); ?>
<div class="bhumi_header_breadcrumb_title">
	<div class="container">
		<div class="row">
		<?php if(have_posts()) :?>
			<div class="col-md-12">
			<h1><?php if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'bhumi' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'bhumi' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bhumi' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'bhumi' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bhumi' ) ) . '</span>' );
					else :
						esc_html_e( 'Archives', 'bhumi' );
					endif; ?>
			</h1></div>
		<?php endif; ?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row bhumi_blog_wrapper">
	<div class="col-md-8">
	<?php
	if ( have_posts()):
	while ( have_posts() ): the_post();
	get_template_part('template-parts/content', get_post_format() ); ?>
	<?php endwhile;
	endif;
	bhumi_navigation(); ?>
	</div>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
