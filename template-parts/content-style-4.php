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

<div id="post-<?php the_ID(); ?>" class="bestwp-fp04-post">

    <?php if ( has_post_thumbnail() ) { ?>
    <?php if ( !(bestwp_get_option('hide_thumbnail')) ) { ?>
    <div class="bestwp-fp04-post-thumbnail">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php /* translators: %s: post title. */ echo esc_attr( sprintf( __( 'Permanent Link to %s', 'bestwp' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail('bestwp-medium-image', array('class' => 'bestwp-fp04-post-thumbnail-img')); ?></a>
    </div>
    <?php } ?>
    <?php } ?>

    <?php if((has_post_thumbnail()) && !(bestwp_get_option('hide_thumbnail'))) { ?><div class="bestwp-fp04-post-details"><?php } ?>
    <?php if(!(has_post_thumbnail()) || (bestwp_get_option('hide_thumbnail'))) { ?><div class="bestwp-fp04-post-details-full"><?php } ?>

    <?php if ( !(bestwp_get_option('hide_post_categories_home')) ) { ?><?php bestwp_style_4_cats(); ?><?php } ?>

    <?php the_title( sprintf( '<h3 class="bestwp-fp04-post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

    <?php bestwp_style_4_postmeta(); ?>

    <?php if ( !(bestwp_get_option('hide_post_snippet')) ) { ?><div class="bestwp-fp04-post-snippet"><?php the_excerpt(); ?></div><?php } ?>

    <?php if ( !(bestwp_get_option('hide_read_more_button')) ) { ?><div class='bestwp-fp04-post-read-more'><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( bestwp_read_more_text() ); ?><span class="screen-reader-text"> <?php the_title(); ?></span></a></div><?php } ?>

    <?php if(!(has_post_thumbnail()) || (bestwp_get_option('hide_thumbnail'))) { ?></div><?php } ?>
    <?php if((has_post_thumbnail()) && !(bestwp_get_option('hide_thumbnail'))) { ?></div><?php } ?>

</div>