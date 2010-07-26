<?php if (have_posts()) : ?>
    	<?php while (have_posts()) : the_post(); ?>
            <div class="post clearfix">
                <div class="entry clearfix">        
                    <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','graphene'), get_the_title()); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-meta clearfix">
                        <p><img src="<?php bloginfo('template_url'); ?>/images/ico_category.png" alt="<?php _e('Categories:', 'graphene'); ?> " /></p>
                        <ul><li><?php the_category(",</li>\n<li>") ?></li></ul>
                        <p class="post-author"><?php edit_post_link(__('Edit post','graphene'), '', ' | '); _e('by ','graphene'); the_author_link(); ?></p>
                    </div>
                    <div class="entry-content clearfix">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="entry-footer">
                        <!-- AddThis button BEGIN -->
                        <p class="add-this"><a href="http://www.addthis.com/bookmark.php?v=250&amp;pub=xa-4a44994446abfdef" onmouseover="return addthis_open(this, '', '[URL]', '[TITLE]')" onmouseout="addthis_close()" onclick="return addthis_sendto()"><img src="http://s7.addthis.com/static/btn/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
                        <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js?pub=xa-4a44994446abfdef"></script>
                        </p>
                        <!-- AddThis button END -->
                        <p class="comment-link"><?php comments_popup_link(__('No comment','graphene'), __('1 comment','graphene'), _n("% comment","% comments", get_comments_number(),'graphene')); ?></p>
                    </div>
                </div>
            </div>            
    	<?php endwhile; ?>
        <div class="post-nav clearfix">
            <p id="previous"><?php next_posts_link(__('Older posts &laquo;','graphene')) ?></p>
            <p id="next-post"><?php previous_posts_link(__('&raquo; Newer posts','graphene')) ?></p>
        </div>
    </div>
	<?php else : ?>
        <div class="post clearfix">
        	<div class="entry clearfix">
                <h2><?php _e('No post found','graphene'); ?></h2>
                <div class="entry-content">
                    <p><?php _e('You might want to try another search using alternative terms.','graphene'); ?></p>
                </div>
            </div>
       	</div>
    </div>
	<?php endif; ?>