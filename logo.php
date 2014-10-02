<?php 
get_header();
	$bartleby_options = bartleby_get_theme_options();
?>
<?php if ( $bartleby_options['bartleby_logo'] != '' ): ?>
	<img src="<?php echo $bartleby_options['bartleby_logo']; ?>" alt="<?php wp_title(); ?><?php _e(' Logo', 'bartleby'); ?>" />
	<?php else : ?>
	<h2 id="site-header">
		<?php echo bloginfo( 'name' ); ?>
	</h2>
<?php endif; ?>