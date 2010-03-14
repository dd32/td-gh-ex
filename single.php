<?php get_header(); ?>


<div id="mainWrap">
  <div id="mainContentTop"></div>
  <div id="mainContent">
  	<div id="text">

		<?php if (have_posts()) : ?>
        
        <?php while (have_posts()) : the_post(); ?>
        
        <div class="post" id="post-<?php the_ID(); ?>">
            
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a><?php edit_post_link('Edit', ' ', ''); ?></h2>
            <p class="time"><?php the_time('l, F j, Y') ?> by <?php the_author() ?></p>
            
            <div class="entry">
            	<?php the_content(''); ?>
                
                <?php wp_link_pages('before=<div class="nav_link">&after=</div>&next_or_number=number&pagelink=<span class="page_number">%</span>'); ?>
            </div>
            
            
            
             <p class="postmetadata">
            	<?php the_tags('Tags: ', ', ', ' '); ?><br />
                Posted in <?php the_category(', ') ?> <br />
				
            </p>
            
            
             
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
    <div id="mainContentBottom"><div id="mainContentDecor"></div></div></div>
    



<!-- ......................... SIDEBAR .............................-->



<?php get_sidebar(); ?>  


<?php get_footer(); ?>