<?php
// tag template
get_header();
	$bartleby_options = bartleby_get_theme_options();
?>

<header id="archive-header">
	<div class="row">
		<div class="sixteen columns">
		<h1 class="big-headline-left">
			<?php
			printf( __( 'Content Tagged "%s"', 'bartleby' ), '<span>' . single_tag_title( 'bartleby', false ) . '</span>' );
			?>
		</h1>
			<?php
			$tag_description = tag_description();
			if ( ! empty( $tag_description ) )
			echo apply_filters( 'tag_archive_meta', '<div class="tag-archive-meta">' . $tag_description . '</div>' );
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
		<div id="post-nav">
				<?php posts_nav_link(' ', '<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>