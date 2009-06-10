<?php get_header(); ?>

<div id="content">

<?php if(is_home()) { ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home-Top') ) : ?><?php endif; ?><?php } ?>

<?php if(is_single() || is_page()) { ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Column-Top') ) : ?><?php endif; ?><?php } ?>

<?php if (have_posts()) :?>
	
<?php $postCount=0; ?>
		
<?php while (have_posts()) : the_post();?>
		
<?php $postCount++;?>
			
	<div class="entry entry-<?php echo $postCount ;?>">
	
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2> 
		<div class="meta">
		<div>Posted <?php the_time('F jS, Y') ?> by <?php the_author() ?> <?php if(is_page()) { ?><!--nothing--><?php }else{ ?>and filed in <?php the_category(', ') ?><?php } ?> <?php edit_post_link('Edit', ' | ', ''); ?></div>
		<div><?php the_tags( 'Tags: ', ', ', ''); ?></div>
		<div><?php comments_popup_link('Add a Comment', '1 Comment', '% Comments', 'commentslink'); ?></div>
		</div><!--end meta-->
	
		<div class="the_content">
		<?php if(is_home()) { ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Post-Top-Right-Home') ) : ?><?php endif; ?><?php } ?>
		<?php if(is_single() || is_page()) { ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Post-Top-Right-Single') ) : ?><?php endif; ?><?php } ?>
		<?php the_content('Continue Reading &raquo;'); ?>
		<?php if(is_home()) { ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Post-Bottom-Home') ) : ?><?php endif; ?> <?php } ?>
		<?php if(is_single() || is_page()) { ?><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Post-Bottom-Single') ) : ?><?php endif; ?> <?php } ?>
		<?php if(is_page()) { ?>
		<ul>
  		<?php
		global $id;
		wp_list_pages("title_li=&child_of=$id"); ?>
		</ul>
		<?php } ?>

		</div><!--end the_content-->
		
		<div class="comments">
		<?php comments_template(); ?>
		</div><!--end comments-->
	
	</div><!--end entry-->

<?php endwhile; ?>
	
		<div id="prevnext">
		<?php previous_posts_link('&laquo; Newer') ?> <?php next_posts_link('Older &raquo;') ?> 
		</div><!--end navigation-->
		
<?php else : ?>
	
	<div class="entry">
		<h2>Not Found</h2>
		<div class="the_content">
		<p>Sorry we can't find what anything that matches your search.</p>
		<p>You could try another search or browse our categories.</p>
		<form method="get" id="searchform" action="http://www.mikejanzen.com/" >
		<label class="hidden" for="s">Search for:</label>
		<div><input type="text" value="sdfghj" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="Search" />
		</div>
		</form>
		</div><!--end the_content-->
		<ul><?php wp_list_categories('title_li=<h2>Categories</h2>'); ?></ul>
	</div><!--end entry-->

<?php endif; ?>

</div><!--end content-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>