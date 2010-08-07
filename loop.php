<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
            <div id="post-<?php the_ID(); ?>" <?php post_class('clearfix post'); ?>>
            
            	<?php /* Posts navigation for single post pages, but not for Page post */ ?>
                <?php if (is_single() && !is_page()) : ?>
            	<div class="post-nav clearfix">
                    <p id="previous"><?php previous_post_link() ?></p>
                    <p id="next-post"><?php next_post_link() ?></p>
                </div>
                <?php endif; ?>
                
                <?php /* Post date is not shown if this is a Page post */ ?>
                <?php if (!is_page()) : ?>
                <div class="date">
                    <p><?php the_time('M'); ?><br /><span><?php the_time('d') ?></span></p>
                </div>
                <?php endif; ?>
                
                <div class="entry clearfix">
                	<?php /* Post title */ ?>
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s','graphene'), get_the_title()); ?>"><?php if (get_the_title() == '') {_e('(No title)','graphene');} else {the_title();} ?></a></h2>
                    <?php /* Post meta */ ?>
                    <div class="post-meta clearfix">
                    	<?php /* Post category is not shown if this is a Page post */ ?>
                        <?php if (!is_page()) : ?>
                        <ul>
                            <li><?php the_category(",</li>\n<li>") ?></li>
                        </ul>
                        <?php endif; ?>
                        
                        <p class="post-author">
							<?php
								if (!is_page()) {
									/* translators: %s refers to the author name */
									printf(__('by %s','graphene'), ' '.get_the_author_link());
								}
								edit_post_link(__('Edit post','graphene'), ' (', ')'); 
							?>
                        </p>
                    </div>
                    
                    <?php /* Post content */ ?>
                    <div class="entry-content clearfix">
                    	<?php if (!is_search() && !is_archive()) : ?>
                        <?php the_content(__('Read the rest of this entry &raquo;','graphene')); ?>
                        <?php else : ?>
                        	<?php the_excerpt(); ?>
                        <?php endif; ?>
                        <?php wp_link_pages(array('before' => __('<p><strong>Pages:</strong> ','graphene'), 'after' => '</p>', 'next_or_number' => 'number')); ?>
                    </div>
                    
                    <?php /* Post footer */ ?>
                    <div class="entry-footer clearfix">
                    	<?php /* Display the post's tags, if there is any */ ?>
                        <p class="post-tags"><?php if (has_tag()) {_e('Tags: ','graphene'); the_tags('', ', ', '');} else {_e('This post has no tag','graphene');} ?></p>
                        
						<?php 
							/**
							 * Display AddThis social sharing button if single post page, comments popup link otherwise.
							 * See the graphene_addthis() function in functions.php
							*/ 
						?>
                        <?php if (is_single() || is_page()) : ?>
                            <?php graphene_addthis(); ?>
                        <?php else : ?>
                        	<p class="comment-link"><?php comments_popup_link(__('Leave comment','graphene'), __('1 comment','graphene'), _n("% comment","% comments", get_comments_number(),'graphene')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <?php 
			/**
			 * Display Adsense advertising for single post pages 
			 * See graphene_adsense() function in functions.php
			*/ 
			?>
            <?php if (is_single() || is_page()) {graphene_adsense();} ?>
            
            <?php /* Get the comments template for single post pages */ ?>
            <?php if (is_single() || is_page()) {comments_template();} ?>
            
	<?php endwhile; ?>
    
    <?php /* Display posts navigation if this is not a single post page */ ?>
    <?php if (!is_single()) : ?>
        <div class="post-nav clearfix">
            <p id="previous"><?php next_posts_link(__('Older posts &laquo;','graphene')) ?></p>
            <p id="next-post"><?php previous_posts_link(__('&raquo; Newer posts','graphene')) ?></p>
        </div>
    <?php endif; ?>
    
<?php /* If there is no post, display message and search form */ ?>
<?php else : ?>
    <div class="post">
        <h2><?php _e('Not found','graphene'); ?></h2>
        <div class="entry-content">
            <p>
			<?php 
				if (!is_search())
					_e("Sorry, but you are looking for something that isn't here. Wanna try a search?","graphene"); 
				else
					_e("Sorry, but no results were found for that keyword. Wanna try an alternative keyword search?","graphene"); 
			?>
                
            </p>
            <?php get_search_form(); ?>
        </div>
    </div>
<?php endif; ?>