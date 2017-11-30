<?php
if (!defined('ABSPATH')) {
    exit;
}
do_action(ATTIRE_THEME_PREFIX . 'before_comments');
?>

    <div id="comments">
<?php if (post_password_required()) : ?>
    <p class="nopassword"><?php echo esc_attr__('This post is password protected. Enter the password to view any comments.', 'attire'); ?></p>
    </div>
    <?php
    return;
endif;
?>
<?php if (have_comments()) :
    ?>
    <h2><?php echo esc_attr(apply_filters(ATTIRE_THEME_PREFIX . 'discussion_title', __('Discussion', 'attire'))); ?></h2>

    <?php
    if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
        <nav id="comment-nav-above">
            <h1 class="assistive-text"><?php echo 'Comment navigation'; ?></h1>
            <div class="nav-previous"><?php previous_comments_link('&larr; Previous Comments'); ?></div>
            <div class="nav-next"><?php next_comments_link('Next Comments &rarr;'); ?></div>
        </nav>
    <?php endif; ?>

    <ul class="commentlist">
        <?php
        /* Loop through and list the comments. Tell wp_list_comments()
         * to use attire_comment() to format the comments.
         * If you want to overload this in a child theme then you can
         * define attire_comment() and that will be used instead.
         * See attire_comment() in edenfresh/functions.php for more.
         */
        wp_list_comments(array('callback' => 'Attire::Comment', 'avatar_size' => 64, 'reply_text' => 'Reply'));
        ?>
    </ul>
<?php endif;


$commenter = wp_get_current_commenter();
$fields = array(
    'author' => '<input class="col-lg-4 form-control" required="required" placeholder="' . __('Name', 'attire') . ' *" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '"/>',
    'email' => '<input class="col-lg-4 form-control" required="required" placeholder="' . __('Email', 'attire') . ' *" id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '"/>',
    'url' => '<input class="col-lg-4 form-control" placeholder="' . __('Website', 'attire') . '" id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '"/>',
);

$args = array(
    'fields' => apply_filters('comment_form_default_fields', $fields),
    'comment_field' => '<textarea required="required" class="col-lg form-control" id="comment" name="comment" rows="8" aria-required="true"></textarea>',
    'must_log_in' => '<p class="must-log-in">' . sprintf(__('You must be <a href="%1$s">logged in</a> to post a comment.', 'attire'), wp_login_url(get_permalink())) . '</p>',
    'logged_in_as' => '<p class="logged-in-as">' . sprintf(__('Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" class="comment-logout" title="Log out of this account">Log out?</a>', 'attire'), admin_url('profile.php'), $user_identity, wp_logout_url(get_permalink())) . '</p>',
    'id_form' => 'commentform',
    'id_submit' => 'submit',
    'title_reply' => apply_filters('attire_title_reply', __('Leave a Comment', 'attire')),
    'title_reply_to' => apply_filters('attire_title_reply_to', __('Leave a Reply to %s', 'attire')),
    'cancel_reply_link' => apply_filters('attire_cancel_reply_link', __('Cancel reply', 'attire')),
    'label_submit' => apply_filters('attire_label_submit', __('Post Comment', 'attire')),
);
comment_form($args); ?>

    </div><!-- #comments -->

<?php
do_action(ATTIRE_THEME_PREFIX . 'after_comments');
