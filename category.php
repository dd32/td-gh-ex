<?php
// generic category template
get_header();
	$bartleby_options = bartleby_get_theme_options();
?>
<header id="archive-header">
	<div class="row">
		<div class="sixteen columns">
			<h1 class="big-headline-left">
				<?php printf( __( '%s', 'bartleby' ), '<span>' . single_cat_title( 'bartleby', false ) . '</span>' ); ?>
			</h1>
			<?php
			$category_description = category_description();
				if ( ! empty( $category_description ) )
				echo apply_filters( 'category_archive_meta', '<div class="cat-archive-meta">' . $category_description . '</div>' ); 
				?>
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