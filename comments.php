	<div id="comments">
		<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.'); ?></p>
			</div><!-- #comments -->
			<?php return; ?>
        <?php endif; ?>

		<?php if (have_comments()) : ?>
			<h3 id="comments-title"><?php printf(_n('One Response to %2$s', '%1$s Responses to %2$s', get_comments_number()), number_format_i18n(get_comments_number()), '<em>'.get_the_title().'</em>'); ?></h3>
			<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
                <div class="navigation">
                    <div class="nav-next"><?php next_posts_link(__('Older Comments <span class="meta-nav">&rarr;</span>')); ?></div>
                    <div class="nav-previous"><?php previous_posts_link(__('<span class="meta-nav">&larr;</span> Newer Comments')); ?></div>
				</div><!-- .navigation -->
			<?php endif; ?>
			<ol class="commentlist">
				<?php wp_list_comments(); ?>
			</ol>
			<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) :  ?>
                <div class="navigation">
                    <?php paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?> 
                </div><!-- .navigation -->
			<?php endif; ?>
		<?php else : ?>
			<?php if ( ! comments_open() ) : ?>
                <p class="nocomments"><?php _e('Comments are closed.'); ?></p>
            <?php endif; ?>
		<?php endif; ?>
		<?php comment_form(); ?>
	</div><!-- #comments -->
