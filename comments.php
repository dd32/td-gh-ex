<?php if ( post_password_required() )
    return; ?>
<div id="comments" class="comments-area">
    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title"><?php printf( _n( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'content' ), number_format_i18n(get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h2>
        <ol class="commentlist">
            <?php wp_list_comments( array( 'callback' => 'Content_comment', 'style' => 'ol' ) ); ?>
        </ol>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav id="comment-nav-below" class="navigation" role="navigation">
                <ul>
                    <h1 class="accessibility section-heading"><?php _e( 'Comment navigation', 'content' ); ?></h1>
                    <li class="prev-link"><?php previous_comments_link( __( '&larr; Older Comments', 'content' ) ); ?></li>
                    <li class="next-link"><?php next_comments_link( __( 'Newer Comments &rarr;', 'content' ) ); ?></li>
                </ul>
            </nav>
        <?php endif;
        if ( ! comments_open() && get_comments_number() ) : ?>
            <p class="nocomments"><?php _e( 'Comments are closed.' , 'content' ); ?></p>
        <?php endif;
    endif;
    comment_form(); ?>
</div>