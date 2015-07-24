<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package BBird Under
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

    <?php // You can start editing here -- including this comment! ?>

    <?php if ( have_comments()) : ?>
    
    
    <h2 class="comments-title">
        
    <h3>
        <?php
printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'bbird-under' ), number_format_i18n( get_comments_number() ) );
 ?>
</h3>
       
    </h2>
 

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through  ?>
        <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php _e('Comment navigation', 'bbird-under'); ?></h2>
            <div class="nav-links">

                <div class="nav-previous"><?php previous_comments_link(__('Older Comments', 'bbird-under')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments', 'bbird-under')); ?></div>

            </div><!-- .nav-links -->
        </nav><!-- #comment-nav-above -->
    <?php endif; // check for comment navigation  ?>

    <ol class="comment-list">
       
     <?php    
        wp_list_comments( array(
    'callback' => 'bbird_under_comments',
    'avatar_size'       => 120,            
) );
     ?> 

     
    </ol><!-- .comment-list -->

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through  ?>
        <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php _e('Comment navigation', 'bbird-under'); ?></h2>
            <div class="nav-links">

                <div class="nav-previous"><?php previous_comments_link(__('Older Comments', 'bbird-under')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments', 'bbird-under')); ?></div>

            </div><!-- .nav-links -->
        </nav><!-- #comment-nav-below -->
    <?php endif; // check for comment navigation  ?>

    <?php endif; // have_comments()  ?>

    <?php
    // If comments are closed and there are comments, let's leave a little note, shall we?
    if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'bbird-under'); ?></p>
    <?php endif; ?>

 
        
    <?php

$commenter = wp_get_current_commenter();
$req       = get_option('require_name_email');
$aria_req  = ($req ? " aria-required='true'" : '');
$html_req  = ($req ? " required='required'" : '');
$html5     = 'html5';


$fields = array(
    'author' => '<div class="row"><div class="medium-6 columns"><p class="comment-form-author">' . '<label for="author">' . __('Name', 'bbird-under') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . $html_req . ' /></p></div>',
    'email' => '<div class="medium-6 columns"><p class="comment-form-email"><label for="email">' . __('Email', 'bbird-under') . ($req ? ' <span class="required">*</span>' : '') . '</label> ' . '<input id="email" name="email" ' . ($html5 ? 'type="email"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req . ' /></p></div></div>',
    'url' => '<p class="comment-form-url"><label for="url">' . __('Website', 'bbird-under') . '</label> ' . '<input id="url" name="url" ' . ($html5 ? 'type="url"' : 'type="text"') . ' value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></p>'
);
comment_form(array(
    
    
    'fields' => $fields,
    'label_submit' => __('Post my Comment', 'bbird-under'),
    'title_reply' => __('Have something to say?', 'bbird-under'),
    'title_reply_to' => __('Respond to %s', 'bbird-under'),
    'comment_notes_before' => '<p class="comment-notes"><span id="email-notes">' . __('(No worries, we will keep your email safe! Also, make sure you fill in email and name fields before posting a comment.)', 'bbird-under') . '</span></p>'
));
?>

</div><!-- #comments -->
