<?php 
/* 	Searchlight Theme's Archive Page
	Copyright: 2014-2020, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Searchlight 1.0
*/

get_header(); ?>
<div id="container">
<div id="content" class="searchinfo">
	<?php if (have_posts()) : ?>
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<h1 class="page-title"><?php the_archive_title(); ?></h1>
		<div class="description"><?php echo the_archive_description(); ?></div>
		<div class="clear"></div>

		<?php while (have_posts()) : the_post(); ?>		
			<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
					<div class="post-container">
 						<div class="fpthumb"><?php the_post_thumbnail('searchlight-fpage-thumb'); ?></div>
        				<div class="entrytext">
            				<a href="<?php the_permalink(); ?>"><h2 class="post-title"><?php the_title(); ?></h2></a>
        					<div class="content-ver-sep"> </div>
							<?php searchlight_content(); ?>
        				</div>
            
        				<div class="clear"> </div>
            			<div class="up-bottom-border">
            				<?php  wp_link_pages( array( 'before' => '<div class="page-link fa-file"><span>' . '' . '</span>', 'after' => '</div><br/>' ) ); 
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
