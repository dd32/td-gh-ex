<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package aari
 */
if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comment_sec mt-50">

    <?php
    // You can start editing here -- including this comment!
    if (have_comments()) :
        ?>
        <h4 class="title">
            <?php
            $comment_count = get_comments_number();
            if (1 === $comment_count) {
                printf(
                        /* translators: 1: title. */
                        esc_html_e('One thought on &ldquo;%1$s&rdquo;', 'aari'), '<span>' . get_the_title() . '</span>'
                );
            } else {
                printf(// WPCS: XSS OK.
                        /* translators: 1: comment count number, 2: title. */
                        esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'aari')), number_format_i18n($comment_count), '<span>' . get_the_title() . '</span>'
                );
            }
            ?>
        </h4><!-- .comments-title -->

        <?php the_comments_navigation(); ?>

        <div class="blog_comments  mb-50">
            <ul class="comment_area">
                <?php
                wp_list_comments(array(
                    'walker' => new aari_walker_comment,
                    'style' => 'ul',
                    'short_ping' => true,
                    'avatar_size' => 65,
                ));
                ?>
            </ul>
        </div><!-- .comment-list -->

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments, let's leave a little note, shall we?
        if (!comments_open()) :
            ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'aari'); ?></p>
            <?php
        endif;

    endif; // Check for have_comments().


    $args = array(
        'format' => 'html5',
        'title_reply' => '<h4 class="title">' . esc_attr__('Leave A Reply', 'aari') . '</h4>',
        'comment_notes_before' => '',
        'comment_field' => '<div class="row"><div class="col-12">'
        . '<div class="comment-form-comment">'
        . '<label for="comment">' . esc_attr__('Comment', 'aari') . '</label>'
        . '<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">'
        . '</textarea></div></div>',
        'class_submit' => 'form-submit',
        'fields' => apply_filters('comment_form_default_fields', array(
            'author' =>
            '<div class="col-lg-4"><div class="comment-form-author form-comment">' .
            '<label for="author">' . esc_attr__('Name', 'aari') . '</label> ' .
            '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) .
            '" size="30" /></div></div>',
            'email' =>
            '<div class="col-lg-4"><div class="comment-form-email form-comment"><label for="email">' . esc_attr__('Email', 'aari') . '</label> ' .
            '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) .
            '" size="30" /></div></div>',
            'url' =>
            '<div class="col-lg-4"><div class="comment-form-url form-comment"><label for="email">' . esc_attr__('Website', 'aari') . '</label>' .
            '<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) .
            '" size="30" /></div></div></div>',
            'cookies' => '',
                )
        )
    );
    comment_form($args);
    ?>

</div><!-- #comments -->
