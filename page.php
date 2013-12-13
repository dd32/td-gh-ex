<?php
/**
 * The template for displaying all pages.
 *
 * @package	Anarcho Notepad
 * @since	2.1.6
 * @author	Arthur (Berserkr) Gareginyan <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013, Arthur Gareginyan
 * @link      	http://mycyberuniverse.tk/anarcho-notepad.html
 * @license   	http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<?php get_header(); ?>

<section id="content" role="main">
  <div class="col01">
  <?php anarcho_breadcrumbs(); ?>
  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h3><?php the_title(); ?></h3>
      <div class="post-inner">
        <div class="date-tab"><span class="month"><?php the_time('F') ?></span><span class="day"><?php the_time('j') ?></span></div>

	        <?php the_post_thumbnail(); ?>

		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'anarcho-notepad' ) ); ?>
      </div>

      <div class="meta"><?php if ((the_category() != '')) { _e('Category: ', 'anarcho-notepad'); the_category(', '); } ?></div>
    </article>
    <?php comments_template(); ?>
    <?php endwhile; ?>

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