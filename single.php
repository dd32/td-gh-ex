<?php
/**
 * The template for displaying all single posts.
 *
 * @package	Anarcho Notepad
 * @since	2.1.3
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

    <div class="before-post"><?php echo get_theme_mod('scrypt_before_post'); ?></div>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h3><?php the_title(); ?></h3>
      <div class="post-inner">
        <div class="date-tab"><span class="month"><?php the_time('F'); ?></span><span class="day"><?php the_time('j'); ?></span></div>
		<?php the_post_thumbnail(); ?>
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'anarcho-notepad' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span>' . __( 'Pages:', 'anarcho-notepad' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
      </div>

      <div class="after-post"><?php echo get_theme_mod('scrypt_after_post'); ?></div>

      <p class="tagsandcopy"><?php the_tags(); ?><br/>
      <?php echo get_theme_mod('copyright_post'); ?></p>

      <div class="meta">
	<?php _e('Posted ', 'anarcho-notepad'); the_date(get_option('m.d.Y')); _e(' by ', 'anarcho-notepad'); the_author(); _e(' in category ', 'anarcho-notepad'); the_category(', '); ?><br/>

        <?php if ( ( get_the_author_meta( 'description' ) != '' ) ) get_template_part( 'author-bio' ); ?>
      </div>
      <?php anarcho_post_nav(); ?>
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