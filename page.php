<?php get_header(); ?>

<?php get_sidebar(); ?>

  <div id="mainContentTop"></div>
  <div id="mainContent">
  	<div id="text">



		<?php if (have_posts()) : ?>
        
        <?php while (have_posts()) : the_post(); ?>
        
        <div class="post-page" id="post-<?php the_ID(); ?>">
            
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a><?php edit_post_link('Edit', ' ', ''); ?></h2>
            
            <div class="entry">
            <?php the_content('Read more »'); ?>
            <?php the_tags('<div id="tags">Tags: ', ', ', '.</div>'); ?> 
            </div>
            
            
            <div id="commentsFrame">
            	<?php comments_template(); ?>
            </div>
            <br />
            <?php endwhile; ?>
            
            
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
        </div>
        
        </div><!-- close #text -->
	</div><!-- end #mainContent -->
  <div id="mainContentBottom"><div id="mainContentDecor"></div></div>
    
<?php get_footer(); ?>