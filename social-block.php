<?php
// social bar
	$bartleby_options = bartleby_get_theme_options();
?>
<div id="social-bar">
	<?php if ( $bartleby_options['facebook_link'] !='' ) { ?>
	<a href="<?php echo $bartleby_options['facebook_link']; ?>">
		<i class="icon-facebook icon-large"></i>
	</a>
	<?php } ?>
	<?php if ( $bartleby_options['twitter_link'] !='' ) { ?>
	<a href="<?php echo $bartleby_options['twitter_link']; ?>">
		<i class="icon-twitter icon-large"></i>
	</a>
	<?php } ?>
	<?php if ( $bartleby_options['gplus_link'] !='' ) { ?>
	<a href="<?php echo $bartleby_options['gplus_link']; ?>">
		<i class="icon-google-plus icon-large"></i>
	</a>
	<?php } ?>
	<?php if ( $bartleby_options['linkedin_link'] !='' ) { ?>
	<a href="<?php echo $bartleby_options['linkedin_link']; ?>">
		<i class="icon-linkedin icon-large"></i>
	</a>
	<?php } ?>
	<?php if ( $bartleby_options['github_link'] !='' ) { ?>
	<a href="<?php echo $bartleby_options['github_link']; ?>">
		<i class="icon-github icon-large"></i>
	</a>
	<?php } ?>
	<?php if ( $bartleby_options['pinterest_link'] !='' ) { ?>
	<a href="<?php echo $bartleby_options['pinterest_link']; ?>">
		<i class="icon-pinterest icon-large"></i>
	</a>
	<?php } ?>
	<?php if ( $bartleby_options['feed_link'] !='' ) { ?>
	<a href="<?php echo $bartleby_options['feed_link']; ?>">
		<i class="icon-rss icon-large"></i>
	</a>
	<?php } ?>
</div>