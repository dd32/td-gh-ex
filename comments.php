<?php
/*
 * comments.php
 * @betilu
 */
    if ( post_password_required() )
        return;
?>
    <section id="comments">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title"><?php get_the_title() ?></h2>
                <ol class="commentlist">
                <?php wp_list_comments( array( 
                                        'reply_text' => __( 'Reply to this thread', 'betilu' ))
                ); ?>
                </ol><!-- ends commentlist -->
                               
        <?php else : // this is displayed if there are no comments so far ?>
	    <?php if ( comments_open() ) : ?>
		<small><?php _e( 'No Comments yet, be the first to reply', 'betilu' ); ?></small>

	<?php else : // then this if comments are closed ?>
	        <small><?php _e( 'Comments are Closed on this Post', 'betilu' ); ?></small>
	    <?php endif;
    endif; ?>
        <div><div><?php paginate_comments_links(); ?></div><br>
        <?php comment_form(); ?>
        </div>
    </section><!-- #comments .comments-area -->
