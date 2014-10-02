<?php
// generic index template
get_header();
$bartleby_options = bartleby_get_theme_options(); ?>
<?php if ( $bartleby_options['home_headline'] !='' && is_home() && !is_paged() ) { ?>
<div class="row">
	<div class="sixteen columns">
		<h2 class="big-headline">
			<?php echo $bartleby_options['home_headline']; ?>
		</h2>
	</div>
</div>
<?php } ?>

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
	<div id="infinite-scroll" class="three columns centered">
		<a class="secondary button" id="infinite-target"><?php _e('Load More Posts', 'bartleby'); ?></a>
	</div>
</div>
<div class="row">
	<div class="ten columns centered">
		<div id="post-nav">
				<?php posts_nav_link(' ', '<i class="icon-arrow-left"></i>', '<i class="icon-arrow-right"></i>'); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>