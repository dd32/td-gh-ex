<?php get_header(); ?>
	<div id="contentArea">
		<div id="main" class="container_16">
			
			<div id="sideBar" class="grid_6">
				<?php include (TEMPLATEPATH . '/sidebar-left.php'); ?>
				<?php include (TEMPLATEPATH . '/sidebar-right.php'); ?>
				<?php include (TEMPLATEPATH . '/sidebar-double.php'); ?>
				<div class="clear">&nbsp;</div>
			</div><!-- /#sideBar -->
			
			<div id="pageContent" class="grid_10 serif">

				<div class="grid_8 prefix_1 suffix_1 alpha omega article">
					<h1>Archives by Month:</h1>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>

					<h1>Archives by Subject:</h1>
						<ul>
							 <?php wp_list_categories(); ?>
						</ul>
				</div><!-- /#article -->
				<div class="clear">&nbsp;</div>

			</div><!-- /#pageContent -->
			
			<div class="clear">&nbsp;</div>
		</div><!-- /#main -->
	</div><!-- /#contentArea -->
<?php get_footer(); ?>
