<!-- COMMENTS -->
<div id="comments">
    <?php if(have_comments()) : ?>
        <h1 class="title"><?php comments_number('No comments', 'One comment', '% comments'); ?> to "<?php the_title(); ?>"</h1>
    <?php endif;					
    if(have_comments()) : ?>
        <div class="navigation">
            <?php paginate_comments_links(); ?>
        </div>
        <ol class="comment-list">
            <?php wp_list_comments('avatar_size=80&type=comment&type=all'); ?>
        </ol>
        <div class="navigation">
            <?php paginate_comments_links(); ?>
        </div> 
	<?php endif;
	if(comments_open()) : ?>
	
		<!-- RESPOND -->
        <?php comment_form(); ?>
        <!-- RESPOND END -->
        
    <?php else :
        if(!is_page()) : ?>
            <h1 class="comments-closed">Comments are Closed</h1>
        <?php endif;
    endif; ?>    
</div>
<!-- COMMENTS END -->