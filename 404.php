<?php get_header(); ?>
	<div id="contentArea">
		<div id="main" class="container_16">
			<div class="sec508"><a href="#menus">Go to menus</a><hr /></div>
			<div id="pageContent" class="grid_10 serif">
				<div class="grid_6 vtab articleInfo">
					<h2>Easy, tiger. This is a... 'Error 404 - Not Found' page.</h2>
					<p>You are <em>totally</em> in the wrong place. Do not pass GO; do not collect $200.</p>
					<p>Instead, try one of the following:</p>
					<ul>
						<li>Hit the "back" button on your browser.</li>
						<li>Head on over to the <a href="<?php bloginfo('url'); ?>">front page</a>.</li>
						<li>Try searching using the form in the sidebar.</li>
						<li>Click on a link in the sidebar.</li>
						<li>Use the navigation menu at the top of the page.</li>
						<li>Punt.</li>
					</ul>
				</div><!-- /#article -->
				<div class="clear">&nbsp;</div>
			</div><!-- /#pageContent -->
			
			<div id="sideBar" class="grid_6">
				<div class="sec508"><a name="menus" id="menus" class="accessiblity"></a></div>
				<?php include (TEMPLATEPATH . '/sidebar-left.php'); ?>
				<?php include (TEMPLATEPATH . '/sidebar-right.php'); ?>
				<?php include (TEMPLATEPATH . '/sidebar-double.php'); ?>
				<div class="clear">&nbsp;</div>
			</div><!-- /#sideBar -->
	
			<div class="clear">&nbsp;</div>
		</div><!-- /#main -->
	</div><!-- /#contentArea -->
				
<?php get_footer(); ?>