<?php /*?>Header<?php */?>
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage JATheme
 * @since JATheme 1.0
 */
get_header(); ?>

	<div id="primary" class="site-content">
    		<?php values_get_ad_728_90(); ?>
		<div id="content" role="main">
		<div class="content-title"><h1>Latest Post</h1></div>
		
        		<?php if ( have_posts() ) : ?>
        
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
                 
                 <div class="content-post-main">
                 <div class="content-post-img">
				 <?php if ( has_post_thumbnail()) : ?>
                 <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail( array(150,150) ); ?></a>			
                 <?php else : ?>
                 <a href="<?php echo get_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/no-image.jpg"  width="150px" 				height="150px" /></a>
                 <?php endif; ?>
                 </div>
                 
                 <div class="content-post-tilte-excerpt">
                 <h4><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                 <small class="content-authore-excerpt"><b>Posted by</b> <?php the_author(); ?>.&nbsp;|&nbsp;<b> Published on</b> <?php get_option('jS F Y') ?></small>
                 <div class="post_expert_index">
                 <?php the_excerpt(); ?><br />
                 </div>
                 <?php $com_num = get_comments_number( ); ?>
				 <?php if( $com_num == 0 ): ?>
                  <small class="content-comment_no">No Comment</small>
                 <?php elseif($com_num == 1): ?>
                 <small class="content-comment_no">1 Comment</small>
                 <?php else:  ?>
                 <small class="content-comment_no"><?php echo $com_num . ' Comments';?></small>
                 <?php endif; ?>
                 
                 </div>
                 </div>
			<?php endwhile; ?>

			<?php JATheme_content_nav( 'nav-below' ); ?>

		<?php else : ?>
<div class="no-found">
<h1>No Post Found</h1>
Search Other Post
<div class="no-found-search"><?php get_search_form(); ?></div>
</div>
		<?php endif; // end have_posts() check ?>
        
		</div>
		</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
