<?php get_header(); ?>
	<div id="contentArea">
		<div id="main" class="container_16">
			<div class="sec508"><a href="#menus">Go to menus</a><hr /></div>
			<div id="pageContent" class="grid_10 serif">
				<div class="grid_9 omega archive"><h2>You are viewing the Search Results for <strong>"<?php the_search_query(); ?>"</strong></h2></div>
			<?php if (have_posts()) : ?><?php //if (is_home()) { query_posts("cat=-1"); } ?>
				<?php while (have_posts()) : the_post(); ?>
				<div class="grid_9 vtab articleInfo">
					<p><span class="unibullet">&raquo;</span> <?php the_time('F jS, Y') ?></p>
				</div><!-- /#articleInfo -->
				<div class="clear">&nbsp;</div>
				<hr class="space short" />
				<div class="grid_8 prefix_1 suffix_1 alpha omega article">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<?php the_content('<span class="more">&raquo; read more</a></span>'); ?>
				</div><!-- /#article -->
				<div class="clear">&nbsp;</div>
				
				<div class="grid_8 prefix_1 suffix_1 alpha omega articleMeta sansSerif">
					<hr class="space" />
					<p><?php comments_popup_link('post a comment', 'one Comment', '% comments'); ?><?php the_tags( ' | tags: ', ', ', ''); ?><br />filed in: <?php the_category(', '); ?></p>
				</div><!-- /#articleMeta -->
				<?php endwhile; ?>
				<?php include (TEMPLATEPATH . '/navigation.php'); ?>
				<div class="clear">&nbsp;</div>
				<?php else : ?>
				<hr class="space short" />
				<div class="grid_8 prefix_1 suffix_1 alpha omega article">
					<h1>Not Found</h1>
					<p>Sorry, but you are searching for something that isn't here, try again...</p>
					<?php include (TEMPLATEPATH . "/searchform.php"); ?>
				</div><!-- /#article -->
				<div class="clear">&nbsp;</div>
			<?php endif; ?>	
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
