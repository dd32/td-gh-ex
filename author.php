<?php
/**
* The template for displaying Author Archive pages.
*
* @package beam
* @since beam 0.1
*/

get_header(); ?>
<div id="content" class="site-content">
<div class="site-content-inner">

<section id="primary" class="content-area">
<main id="main" class="site-main" role="main">

<?php if ( have_posts() ) : ?>
<?php
the_post();
?>

<header class="page-header">
<div id="author-description" class="round-corners">  
<h2><?php printf( __( 'About %s', 'beam' ), get_the_author() ); ?></h2> 
<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( '_s_author_bio_avatar_size', 60 ) ); ?>
<?php the_author_meta( 'description' ); ?><br />
<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">View all posts by <?php the_author(); ?> <span class="meta-nav">&rarr;</span></a>

<div class="social-author">
<?php global $beam_options;
if ($beam_options['opt-facebook-url']) { ?>
<div class="social-author-all social-fb">
<a href="<?php echo $beam_options['opt-facebook-url'] ?>" title="Facebook" rel="me" target="_blank"><div class="fb"><i class="fa fa-facebook fa-2x"></i>			</div></a>
</div>
<?php } if (isset ($beam_options['opt-twitter-url'])) { ?>
<div class="social-author-all social-tw">
<a href="<?php echo $beam_options['opt-twitter-url'] ?>" title="Twitter" rel="me" target="_blank"><div class="tw"><i class="fa fa-twitter fa-2x"></i></div></a>
</div>
<?php } if (isset ($beam_options['opt-googleplus-url'])) { ?>
<div class="social-author-all social-gp">
<a href="<?php echo $beam_options['opt-googleplus-url'] ?>" title="Google+" rel="me" target="_blank"><div class="gp"><i class="fa fa-google-plus fa-2x"></i></div></a>
</div>
<?php } ?>
</div>

</div><!-- #author-description -->
<!-- if end -->

</header>

<?php
rewind_posts();
?>

<?php beam_content_nav( 'nav-above' ); ?>

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php
get_template_part( 'content', get_post_format() );
?>
<?php endwhile; ?>

<?php // toolbox_content_nav( 'nav-below' ); ?>

<?php else : ?>

<article id="post-0" class="post no-results not-found">
<header class="entry-header">
<h1 class="entry-title"><?php _e( 'Nothing Found', 'beam' ); ?></h1>
</header><!-- .entry-header -->

<div class="entry-content">
<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'beam' ); ?></p>
<?php get_search_form(); ?>
</div><!-- .entry-content -->
</article><!-- #post-0 -->

<?php endif; ?>

</main><!-- .site-main -->
</section><!-- #primary -->
 
<?php get_sidebar(); ?>
<?php get_footer(); ?>