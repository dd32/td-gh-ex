<?php 
/* 	Searchlight Theme's Archive Page
	Copyright: 2014, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Searchlight 1.0
*/

get_header(); ?>
<div id="container">
<div id="content" class="searchinfo">
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="page-title genericon-document-archive-o utext"><?php single_cat_title(); ?></h1><h3 class="arc-src"><?php echo __('now browsing by category', 'searchlight'); ?></h3>
		<?php if(trim(category_description()) != "<br />" && trim(category_description()) != '') { ?>
		<div id="description"><?php echo category_description(); ?></div>
		<?php }?>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h1 class="page-title genericon-document-archive-o utext"><?php single_tag_title(); ?></h1><h3 class="arc-src"><?php echo __('now browsing by tag', 'searchlight'); ?></h3>
		<div class="clear">&nbsp;</div>
		<div class="tagcloud"><?php wp_tag_cloud(''); ?></div>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="page-title genericon-document-archive-o utext"><?php echo get_the_date('l, F jS, Y'); ?></h1><h3 class="arc-src"><?php echo __('now browsing by day', 'searchlight'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="page-title genericon-document-archive-o utext"><?php echo get_the_date('F, Y'); ?></h1><h3 class="arc-src"><?php echo __('now browsing by month', 'searchlight'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="page-title genericon-document-archive-o utext"><?php echo get_the_date('Y'); ?></h1><h3 class="arc-src"><?php echo __('now browsing by year', 'searchlight'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="page-title genericon-document-archive-o utext"><?php echo __('Archives', 'searchlight'); ?></h1><h3 class="arc-src"><?php echo __('now browsing by author', 'searchlight'); ?></h3>
		<div class="clear">&nbsp;</div>
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="page-title genericon-document-archive-o utext"><?php echo __('Archives', 'searchlight'); ?></h1><h3 class="arc-src"><?php echo __('now browsing the general archives', 'searchlight'); ?></h3>
 	 	<?php } ?>

		<?php while (have_posts()) : the_post(); ?>
		
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<div class="post-container">
 						<div class="fpthumb"><?php the_post_thumbnail('fpage-thumb'); ?></div>
        				<div class="entrytext">
            				<a href="<?php the_permalink(); ?>"><h2 class="post-title"><?php the_title(); ?></h2></a>
        					<div class="content-ver-sep"> </div>
							<?php searchlight_content(); ?>
        				</div>
            
        				<div class="clear"> </div>
            			<div class="up-bottom-border">
            				<?php  wp_link_pages( array( 'before' => '<div class="page-link genericon-document"><span>' . '' . '</span>', 'after' => '</div><br/>' ) ); 
            				searchlight_post_meta();
						?>
						</div>
					</div>
			</div>
	
		<?php endwhile; ?>
			
		<?php searchlight_page_nav(); ?>

	<?php else : ?>

		<?php searchlight_not_found(); ?>

	<?php endif; ?>

</div><!--close content id-->

<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
