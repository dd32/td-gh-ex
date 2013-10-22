<?php
/**
 * The template for displaying Category pages.
 *
 * @package	Anarcho Notepad
 * @since	2.1
 * @author	Arthur Gareginyan aka Brute9000 <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013, Arthur Gareginyan
 * @link      	http://mycyberuniverse.tk/anarcho-notepad.html
 * @license   	http://opensource.org/licenses/AGPL-3.0
 */
?>

<?php get_header(); ?>

<section id="content" role="main">
  <div class="col01">
  <?php anarcho_breadcrumbs(); ?>
  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
      <div class="post-inner">
        <div class="date-tab"><span class="month"><?php the_time('F') ?></span><span class="day"><?php the_time('j') ?></span></div>

		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'anarcho-notepad' ) ); ?>
      </div>
      <div class="meta"><?php _e('Category: ', 'anarcho-notepad'); ?><?php the_category(', ') ?> |  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
    </article>
    <?php endwhile; ?>

    <?php anarcho_page_nav(); ?>

    <?php else : ?>

	<div class="no-results">
		<h3>Not Found</h3>
		<p>Sorry, but you are looking for something that isn't here.</p>
	</div>


    <?php endif; ?>
  </div>

   <?php get_sidebar(); ?>
</section><br clear="all" />

<?php get_footer(); ?>