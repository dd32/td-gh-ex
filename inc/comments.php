<?php
/**
* bellini comment template
* @since 1.0.0
*/
function bellini_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : ?>
            <li <?php comment_class(); ?> id="comment<?php comment_ID(); ?>">
            <div class="back-link"><?php comment_author_link(); ?></div>
        <?php break;
        default : ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
            <article <?php comment_class('comment'); ?>>
            <div class="comment-body row">

                <div class="col-md-2 comment-body__left">
                <div class="author vcard">
                    <?php echo get_avatar( $comment, 100 ); ?>
                </div>
                </div>

                <div class="col-md-10 comment-body__right">
                <div class="row">
                    <h5 class="col-md-10 comment__author"><?php comment_author(); ?></h5>
                    <span class="col-md-2 text-right"><?php edit_comment_link( esc_html__( 'Edit', 'bellini' ), '  ', '' ); ?></span>
                    <span class="comment__meta col-md-12">
                        <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) );?>" class="comment__meta__info">
                            <time>
                                <span class="comment__date"><?php comment_date(); ?></span>
                                <span class="comment__time"><?php comment_time(); ?></span>
                            </time>
                        </a>
                    </span>
                    <div class="col-md-12 comment__body" role="button">
                        <?php comment_text(); ?>
                    </div>
                    <span class="button--reply">
                        <?php
                            comment_reply_link( array_merge( $args, array(
                                'reply_text' => esc_html__('Reply', 'bellini'),
                                'depth' => $depth,
                                'max_depth' => $args['max_depth']
                        ) ) ); ?>
                    </span>
                </div>
                </div>
            </div>
          </article>
        <?php
        break;
endswitch;
}