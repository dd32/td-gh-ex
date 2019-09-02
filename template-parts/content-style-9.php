<?php
/**
* Template part for displaying posts.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package BestWP WordPress Theme
* @copyright Copyright (C) 2019 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<div id="post-<?php the_ID(); ?>" class="bestwp-fp09-post">

    <?php if ( has_post_thumbnail() ) { ?>
    <?php if ( !(bestwp_get_option('hide_thumbnail')) ) { ?>
    <div class="bestwp-fp09-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'bestwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail('bestwp-featured-image', array('class' => 'bestwp-fp09-post-thumbnail-img')); ?></a>
    </div>
    <?php } ?>
    <?php } ?>

    <?php if((has_post_thumbnail()) && !(bestwp_get_option('hide_thumbnail'))) { ?><div class="bestwp-fp09-post-details"><?php } ?>
    <?php if(!(has_post_thumbnail()) || (bestwp_get_option('hide_thumbnail'))) { ?><div class="bestwp-fp09-post-details-full"><?php } ?>

    <?php if ( !(bestwp_get_option('hide_post_categories_home')) ) { ?><?php bestwp_style_9_cats(); ?><?php } ?>

    <?php the_title( sprintf( '<h3 class="bestwp-fp09-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

    <?php bestwp_style_9_postmeta(); ?>

    <div class="bestwp-fp09-post-snippet clearfix">
    <?php
    the_content( sprintf(
        wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span> <span class="meta-nav">&rarr;</span>', 'bestwp' ),
            array(
                'span' => array(
                    'class' => array(),
                ),
            )
        ),
        get_the_title()
    ) );

    wp_link_pages( array(
     'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'bestwp' ) . '</span>',
     'after'       => '</div>',
     'link_before' => '<span>',
     'link_after'  => '</span>',
     'separator'   => '',
     ) );
    ?>
    </div>

    <?php if ( !(bestwp_get_option('hide_post_tags_home')) ) { ?>
    <footer class="bestwp-fp09-post-footer">
        <?php if ( !(bestwp_get_option('hide_post_tags_home')) ) { ?><?php bestwp_post_tags(); ?><?php } ?>
    </footer>
    <?php } ?>

    <?php if(!(has_post_thumbnail()) || (bestwp_get_option('hide_thumbnail'))) { ?></div><?php } ?>
    <?php if((has_post_thumbnail()) && !(bestwp_get_option('hide_thumbnail'))) { ?></div><?php } ?>

</div>