<?php  get_header(); ?>
	<article id="search-results">
	<?php  if (have_posts()) : ?>
		<h2 class="pagetitle">Search Results for &quot;<?php  the_search_query(); ?>&quot;</h2>
		<?php 
	while (have_posts()) :
	the_post();
	?>
			<div <?php  post_class()  ?>>
				<h3 id="post-<?php  the_ID(); ?>">&bull; <a href="<?php  the_permalink()  ?>" rel="bookmark" title="Permanent Link to <?php  the_title_attribute(); ?>"><?php  the_title(); ?></a></h3>
				<small><?php  the_time(get_option('date_format'))  ?></small>
			</div>
		<?php  endwhile; ?>
		<div class="navigation">
			<div class="alignleft"><?php  next_posts_link('&laquo; Older Entries')  ?></div>
			<div class="alignright"><?php  previous_posts_link('Newer Entries &raquo;')  ?></div>
		</div>
	<?php  else : ?>
		<h2>READY.<br><?php  the_search_query(); ?></h2>
		<h2 class="center">?SYNTAX&nbsp;&nbsp;ERROR<br>READY.</h2>
	<?php  endif; ?>
<?php 
	
	if(is_active_widget(false,false,'search')){
		//echo "Active Search Widget"; //We don't need to place the search box here, since we have already into the sidebar.
	} else {
		get_search_form();
	}

	?>
	</article>
<?php  get_footer(); ?>