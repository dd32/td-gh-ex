<?php
/**
 * The template for displaying Home page.
 *
 * @package	Anarcho Notepad
 * @since	2.5
 * @author	Arthur (Berserkr) Gareginyan <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013-2014, Arthur Gareginyan
 * @link      	http://mycyberuniverse.com/anarcho-notepad.html
 * @license   	http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<?php get_header(); ?>

<section id="content" role="main">
  <div class="col01">
  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <?php anarcho_ribbons(); ?>

      <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
      <div class="post-inner">

		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

		<?php the_content( __( 'Continue reading', 'anarcho-notepad' ) ); ?>

      </div>
      <div class="meta"><?php _e('Category: ', 'anarcho-notepad'); ?><?php the_category(', ') ?></div>
    </article>
    <?php endwhile; ?>

    <?php anarcho_page_nav(); ?>

    <?php else : ?>

	<div class="no-results">
		<h1><?php _e('Not Found', 'anarcho-notepad'); ?></h1>
		<p><?php _e('Sorry, but you are looking for something that isn\'t here.', 'anarcho-notepad'); ?></p>
	</div>

    <?php endif; ?>
  </div>

   <?php get_sidebar(); ?>
</section><br clear="all" />

<?php get_footer(); ?>