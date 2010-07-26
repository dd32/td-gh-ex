<div class="post clearfix">
    <div class="entry clearfix">
        <h2><?php _e('Error 404 - Page Not Found', 'graphene'); ?></h2>
        <div class="entry-content clearfix">
            <p><?php _e("Sorry, I've looked everywhere but I can't find the page you're looking for.", 'graphene'); ?></p>
            <p><?php _e("If you follow the link from another website, I may have removed or renamed the page some time ago. You may want to try searching for the page:", 'graphene'); ?></p>
            
            <?php get_search_form(); ?>
        </div>
    </div>
</div>
<div class="post clearfix">
	<div class="entry clearfix"> 
	<h2><?php _e('Suggested results', 'graphene'); ?></h2>   
        <div class="entry-content clearfix">
        <p>
        <?php /* translators: %s is the search term */ ?>
        <?php printf(__("I've done a courtesy search for the term %s for you. See if you can find what you're looking for in the list below:", 'graphene'), '<a href="'.$_GET['full_search_url'].'">'.$_GET['search_term'].'</a>'); ?>
        </p>
        <?php if (have_posts()) : ?>    
            <ul style="margin-left:20px;padding-left:0;">
            <?php while (have_posts()) : the_post(); ?>
                <li>
                    <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                     <?php the_excerpt(); ?>
                </li>
            <?php endwhile; ?>
            </ul>
        </div>
    </div>
</div>            
    <div class="post-nav clearfix">
        <p id="previous"><?php next_posts_link('Older posts &laquo;') ?></p>
        <p id="next-post"><?php previous_posts_link('&raquo; Newer posts') ?></p>
    </div>
<?php else : ?>
			<p><?php _e("<strong>Sorry, couldn't find anything.</strong> Try searching for alternative terms using the search form above.", 'graphene'); ?></p>
    	</div>
    </div>
</div>
<?php endif; ?>