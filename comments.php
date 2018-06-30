<?php
/**
 * The Comments template file
 *
**/
if (post_password_required())
    return;
?>
<div class="clearfix"></div> 
<div id="comments" class="article-title">
    <?php if (have_comments()) : ?>
        <div class="article-title">
            <h2>
             <?php 
             printf( // WPCS: XSS OK.
                    /* translators: 1: comment count number, 2: title. */
                    esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'impressive' ) ),
                    number_format_i18n(get_comments_number() ),
                    '<span>' . get_the_title() . '</span>'
                );
	     ?>   
            </h2>
        </div>
        <ol class="comments-box clearfix ">
        <?php wp_list_comments(array('avatar_size' => 80, 'style' => 'ol', 'short_ping' => true,)); ?>
        </ol>
        <?php  paginate_comments_links(); 
        endif;
        comment_form(); ?>
</div>