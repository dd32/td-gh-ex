<?php
/**
 * @package WordPress
 * @subpackage AdStyle
 */
?>

<?php get_header(); ?>

  <div id="mainContentTop"></div>
  <div id="mainContent">
  	<div id="text">
    
    	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
    
            <div class="post" id="post-<?php the_ID(); ?>">
                    
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
            
            <p class="time"><?php the_time('l, j. F Y') ?></p>
            
            
            <p><?php the_content('Read more »'); ?>
               <?php the_tags('<div id="tags">Tags: ', ', ', '.</div>'); ?> 
            </p>
            
            <p class="postmetadata">
                Posted in <?php the_category(', ') ?> by <?php the_author() ?> - <?php comments_popup_link('No Comments','1 Comment','% Comments','Comments Off') ?>
            </p>
        
        	</div>
        <?php comments_template(); ?>
		<?php endwhile; ?>
        
        
        <div class="previous_next">
			<?php posts_nav_link(' | ','&laquo; Previous Page','Next Page &raquo;'); ?>
        </div>
        
		<?php else : ?>
            <div class="post">
                <h2 class="notfound">Not Found</h2>
                <p class="sorry">Sorry, but you are looking for something that isn't here. 
                Please use the following tags to find content which could be interessting for you:</p>
                <div id="tags-nofound">
                <?php wp_tag_cloud(''); ?>
                </div>
            </div>
        <?php endif; ?>
        
       
        
        </div><!-- close #text -->
	</div><!-- end #mainContent -->
    <div id="mainContentBottom"><div id="mainContentDecor"></div></div>
    
<?php get_sidebar(); ?>


<?php get_footer(); ?>
