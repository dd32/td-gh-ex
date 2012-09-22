<?php get_header(); ?>

<div id="main">

	<div id="not-found-wrap">
		<h2>Error 404 !</h2>
		
		<p>Sorry. The Page or File you were looking for was not found.</p>
	
		<form role="search" method="get" id="error-search" action="<?php echo home_url( '/' ); ?>">
			<input type="text" id="searchinput" value="Search" onfocus="if (this.value == 'Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Search';}" name="s" />
			<input type="submit" id="searchsubmit" value="Search" />
		</form>
	</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer();?>