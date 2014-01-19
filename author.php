<?php
/**
 * The template for displaying Author page.
 *
 * Template Name: Author page
 *
 * @package	Anarcho Notepad
 * @since	2.4
 * @author	Arthur (Berserkr) Gareginyan <arthurgareginyan@gmail.com>
 * @copyright 	Copyright (c) 2013-2014, Arthur Gareginyan
 * @link      	http://mycyberuniverse.tk/anarcho-notepad.html
 * @license   	http://www.gnu.org/licenses/gpl-3.0.html
 */
?>

<?php get_header(); ?>

<section id="content" role="main">
  <div class="col01">

<?php anarcho_breadcrumbs(); ?>

<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>

  <?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

    <?php endwhile; ?>
    <?php else : ?>

	<div class="no-results">
		<h1>Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>
	</div>


    <?php endif; ?>
  </div>

   <?php get_sidebar(); ?>
</section><br clear="all" />

<?php get_footer(); ?>
