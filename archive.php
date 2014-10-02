<?php
// generic archive template
get_header();
	$bartleby_options = bartleby_get_theme_options();
?>
<header id="archive-header">
	<div class="row">
		<div class="sixteen columns">
			<h1 class="big-headline-left">
				<?php if ( is_day() ) : ?>
				<?php printf( __( 'Daily Archives: %s', 'bartleby' ), '<span>' . get_the_date() . '</span>' ); ?>
				<?php elseif ( is_month() ) : ?>
				<?php printf( __( 'Monthly Archives: %s', 'bartleby' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'bartleby' ) ) . '</span>' ); ?>
				<?php elseif ( is_year() ) : ?>
				<?php printf( __( 'Yearly Archives: %s', 'bartleby' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'bartleby' ) 				) . '</span>' ); ?>
				<?php else : ?>
				<?php esc_attr_e( 'Archives', 'bartleby' ); ?>
				<?php endif; ?>
			</h1>
		</div>
	</div>
</header>
<?php if( $bartleby_options['column_posts'] == '1' ) {
		get_template_part ('inc/two', 'columns' );
		} elseif
			( $bartleby_options['column_posts'] == '2' ) {
				get_template_part ('inc/three', 'columns' );
				} elseif
					( $bartleby_options['column_posts'] == '3' ) {
						get_template_part ('inc/no', 'columns' );
						}
						?>
<div class="row">
	<div class="three columns centered">
		<a class="secondary button" id="infinite-target"><?php _e('Load More Posts', 'bartleby'); ?></a>
	</div>
</div>
<div class="row">
	<div id="infinite-scroll" class="three columns centered">
		<section id="post-nav" role="navigation">
				<?php posts_nav_link(' ', '<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'); ?>
		</section>
	</div>
</div>
<?php get_footer(); ?>