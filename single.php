<?php
/**
 * @package WordPress
 * @subpackage Avedon
 * @since Avedon 1.04
 */

get_header(); ?>

<div id="primary" class="row-fluid">
<div class="span6 offset1 well">
<?php avedon_breadcrumbs();?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="post-<?php the_ID(); ?>" class="single-entry group">

<h1><?php the_title(); ?></h1>

<?php if ( has_post_format( 'aside' )) { echo '<i class="cattag avedonicon-adjust"></i>'; }
if ( has_post_format( 'image' )) { echo '<i class="cattag avedonicon-camera"></i>'; }
if ( has_post_format( 'link' )) { echo '<i class="cattag avedonicon-link"></i>'; }
if ( has_post_format( 'quote' )) { echo '<i class="cattag avedonicon-quote-right"></i>'; }
if ( has_post_format( 'status' )) { echo '<i class="cattag avedonicon-time"></i>'; }
if ( has_post_format( 'video' )) { echo '<i class="cattag avedonicon-facetime-video"></i>'; }
if ( has_post_format( 'audio' )) { echo '<i class="cattag avedonicon-music"></i>'; }
if ( has_post_format( 'chat' )) { echo '<i class="cattag avedonicon-comment"></i>'; }
if ( has_post_format( 'gallery' )) { echo '<i class="cattag avedonicon-picture"></i>'; } ?>

<div class="row-fluid post-meta group">
<div class="post-date span12 sunken">

<span class="post-date">Posted: </span><span class="post-date-link"><?php the_time('M jS, Y') ?> <?php edit_post_link('(Edit)', '', ''); ?> | </span>
<span class="post-author">Author: </span><span class="post-author-link"><?php the_author_posts_link(); ?></span>
<span class="post-comment"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>

</div>
</div>

<div <?php post_class() ?>>
<?php the_content(); ?>
<?php wp_link_pages(array('before' => '<p class="paginate-post"><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

<?php if (has_tag()) { ?>
<div class="row-fluid post-tag">Tags: <?php the_tags(', ') ?></div>

<?php } ?>

</div>

<?php comments_template(); ?>

<?php endwhile; else : ?>

<div class="single-entry group">
<h2>Nothing Found</h2><p>Oh Snap!  It looks like you're trying to reach a page that's gone. Please check the link and try again.</p>
</div>

<?php endif; ?>
<?php avedon_content_nav('nav-below');?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
