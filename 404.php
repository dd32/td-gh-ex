<?php get_header(); ?>
<div id="archive-title"></div>
<div id="content" class="clear" > <!-- begin content -->	
	<div id="left-column"> <!-- begin left-column -->
		<div id="left-column-inner" class="clear"> <!-- begin left-column-inner -->
			<div class="post">
				<h2><a href="<?php echo home_url(); ?>/">Error 404 &ndash; File not Found</a></h2>
				<div class="entry">
					<p><strong>Sorry, but the page you were looking for could not be found.</strong></p>
					<p>You can use our Search Form.</p>
					<div class="alignleft">
						<?php get_search_form(); ?>
					</div>
	  			</div>
			</div> <!-- end post -->
    	</div> <!-- end left-column-inner -->       
	</div> <!-- end left-column -->
		
<?php get_sidebar(); ?>

<?php get_footer(); ?>