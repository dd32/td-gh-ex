<?php global $bartleby_options;
$bartleby_settings = get_option( 'bartleby_options', $bartleby_options );
?>

	<?php if ( $bartleby_settings['bartleby_logo'] != '' ): ?>
	<img src="<?php echo $bartleby_settings['bartleby_logo']; ?>" alt="Logo" />

<?php else : ?>

	<h1>
		<?php echo bloginfo( 'name' ); ?>
	</h1>
<?php endif; ?>
