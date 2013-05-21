<!-- Start the Loop. -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<!--Start post-->
                 <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
					<div class="postimg">
                    <?php the_post_thumbnail(); ?>
					</div>
                    <?php } else {                        
                    }
                    ?> 					
                    <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <div class="post_content"> 
                <ul class="post_meta">
                  <li class="posted_by"><span>&nbsp;<?php the_author_posts_link(); ?></span></li>
                   <li class="posted_in">&nbsp;&nbsp;<?php the_category(', '); ?></li>
                  <li class="post_date"><span>on&nbsp;<?php echo get_the_time('M, d, Y') ?></span></li>
                  <li class="postc_comment"><span>&nbsp;<?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?></span></li>
                </ul>
             <?php the_excerpt(); ?>
            <a class="read-more" href="<?php the_permalink() ?>">Read More</a>
              </div>
             </div>
			 <?php endwhile;
else: ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <p>
            <?php _e('Sorry, no posts matched your criteria.', 'appointway'); ?>
        </p>
    </div>
<?php endif; ?>
  <div class="clear"></div>
              <!--End post-->
