<?php
/**
* Post meta functions
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

if ( ! function_exists( 'bestwp_post_tags' ) ) :
/**
 * Prints HTML with meta information for the tags.
 */
function bestwp_post_tags() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'bestwp' ) );
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            printf( '<span class="bestwp-tags-links"><i class="fa fa-tags" aria-hidden="true"></i> ' . esc_html__( 'Tagged %1$s', 'bestwp' ) . '</span>', $tags_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'bestwp_style_9_cats' ) ) :
function bestwp_style_9_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'bestwp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="bestwp-fp09-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'bestwp' ) . '</div>', $categories_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'bestwp_style_9_postmeta' ) ) :
function bestwp_style_9_postmeta() { ?>
    <?php if ( !(bestwp_get_option('hide_post_author_home')) || !(bestwp_get_option('hide_posted_date_home')) || !(bestwp_get_option('hide_comments_link_home')) ) { ?>
    <div class="bestwp-fp09-post-footer">
    <?php if ( !(bestwp_get_option('hide_post_author_home')) ) { ?><span class="bestwp-fp09-post-author bestwp-fp09-post-meta"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'bestwp'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(bestwp_get_option('hide_posted_date_home')) ) { ?><span class="bestwp-fp09-post-date bestwp-fp09-post-meta"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'bestwp'); ?></span><?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(bestwp_get_option('hide_comments_link_home')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="bestwp-fp09-post-comment bestwp-fp09-post-meta"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bestwp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;



if ( ! function_exists( 'bestwp_style_4_cats' ) ) :
function bestwp_style_4_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( '&nbsp;', 'bestwp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="bestwp-fp04-post-categories">' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'bestwp' ) . '</div>', $categories_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'bestwp_style_4_postmeta' ) ) :
function bestwp_style_4_postmeta() { ?>
    <?php if ( !(bestwp_get_option('hide_post_author_home')) || !(bestwp_get_option('hide_posted_date_home')) || !(bestwp_get_option('hide_comments_link_home')) ) { ?>
    <div class="bestwp-fp04-post-footer">
    <?php if ( !(bestwp_get_option('hide_post_author_home')) ) { ?><span class="bestwp-fp04-post-author bestwp-fp04-post-meta"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'bestwp'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span><?php } ?>
    <?php if ( !(bestwp_get_option('hide_posted_date_home')) ) { ?><span class="bestwp-fp04-post-date bestwp-fp04-post-meta"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'bestwp'); ?></span><?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(bestwp_get_option('hide_comments_link_home')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="bestwp-fp04-post-comment bestwp-fp04-post-meta"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bestwp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;


if ( ! function_exists( 'bestwp_single_cats' ) ) :
function bestwp_single_cats() {
    if ( 'post' == get_post_type() ) {
        /* translators: used between list items, there is a space */
        $categories_list = get_the_category_list( esc_html__( ', ', 'bestwp' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            printf( '<div class="bestwp-entry-meta-single bestwp-entry-meta-single-top"><span class="bestwp-entry-meta-single-cats"><i class="fa fa-folder-open-o" aria-hidden="true"></i>&nbsp;' . __( '<span class="screen-reader-text">Posted in </span>%1$s', 'bestwp' ) . '</span></div>', $categories_list ); /* phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped */
        }
    }
}
endif;


if ( ! function_exists( 'bestwp_single_postmeta' ) ) :
function bestwp_single_postmeta() { ?>
    <?php if ( !(bestwp_get_option('hide_post_author')) || !(bestwp_get_option('hide_posted_date')) || !(bestwp_get_option('hide_comments_link')) || !(bestwp_get_option('hide_post_edit')) ) { ?>
    <div class="bestwp-entry-meta-single">
    <?php if ( !(bestwp_get_option('hide_post_author')) ) { ?><span class="bestwp-entry-meta-single-author"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;<span class="author vcard" itemscope="itemscope" itemtype="http://schema.org/Person" itemprop="author"><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><span class="screen-reader-text"><?php esc_html_e('Author: ', 'bestwp'); ?></span><?php echo esc_html( get_the_author() ); ?></a></span></span><?php } ?>
    <?php if ( !(bestwp_get_option('hide_posted_date')) ) { ?><span class="bestwp-entry-meta-single-date"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;<span class="screen-reader-text"><?php esc_html_e('Published Date: ', 'bestwp'); ?></span><?php echo get_the_date(); ?></span><?php } ?>
    <?php if ( !(bestwp_get_option('hide_comments_link')) ) { ?><?php if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) { ?>
    <span class="bestwp-entry-meta-single-comments"><i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;<?php comments_popup_link( sprintf( wp_kses( /* translators: %s: post title */ __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bestwp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ) ); ?></span>
    <?php } ?><?php } ?>
    <?php if ( !(bestwp_get_option('hide_post_edit')) ) { ?><?php edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __( 'Edit<span class="screen-reader-text"> %s</span>', 'bestwp' ), array( 'span' => array( 'class' => array(), ), ) ), get_the_title() ), '<span class="edit-link">&nbsp;&nbsp;<i class="fa fa-pencil" aria-hidden="true"></i> ', '</span>' ); ?><?php } ?>
    </div>
    <?php } ?>
<?php }
endif;