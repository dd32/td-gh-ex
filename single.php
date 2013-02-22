<?php get_header(); ?>

<div class="row">

<div class="twelve columns">

<div class="single-article" role="main">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<article <?php post_class(); ?>>

<h1 id="post-<?php the_ID(); ?>" class="article-title">

<?php the_title(); ?>

</h1>

<section class="byline" role="contentinfo">

<span class="postinfo"><?php esc_attr_e('By ' , '' ); ?>

<?php the_author_posts_link(); ?> - <?php esc_attr_e('Published: ' , '' ); ?><?php the_time('m/d/Y'); ?> - <?php esc_attr_e('Category: ' , '' ); ?><?php the_category(', ') ?></span>

</section><!-- .byline -->

<section class="post-content">

<?php the_content(); ?>

<?php wp_link_pages('before=<div class="page-links">&after=</div>'); ?>

<hr>

<footer class="post-footer">

<span class="tag-links">

<?php the_tags(); ?>

</span>

<section class="article-nav" role="navigation">

<?php previous_post_link(); ?> - <?php next_post_link(); ?>

</section><!--End Article Navigation-->

<hr>

<?php do_action( 'before_widget' ); ?>

<?php if ( !dynamic_sidebar( 'belowposts-sidebar' ) ) : ?>

<?php endif; ?></footer>

</section><!-- .post-content -->

</article>

<?php endwhile; ?>

<?php comments_template(); ?>

<?php else : ?>

<h2 class="center"><?php esc_attr_e('Nothing is Here - Page Not Found', ''); ?></h2>

<div class="entry-content">

<p><?php esc_attr_e( 'Sorry, but we couldn\'t find what you we\'re looking for.', '' ); ?></p>

</div><!-- .entry-content -->

<?php endif; ?>

</div><!--End Single Article-->

</div>

<?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>