<?php get_header(); ?>
<?php global $bartleby_options;
$bartleby_settings = get_option( 'bartleby_options', $bartleby_options );
?>

<?php if ( $bartleby_settings['home_headline'] !='' && is_home() && !is_paged() ) { ?>
<div class="row">
<div class="sixteen columns">
<h1 class="big-headline">
<?php echo $bartleby_settings['home_headline']; ?>
</h1>
</div>
</div>
<?php } ?>

<?php if( $bartleby_settings['column_posts']) : ?>

<div class="row">
<div class="sixteen columns">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="eight columns">
<div class="column-post">
<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
<h5 class="latest-title">
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h5>
<div class="bartleby-excerpt">
<?php the_excerpt(); ?>
</div>
</article>
</div>
</div>
<?php endwhile; ?>
</div>
</div>
<?php endif; ?>
<div class="row">
<div class="ten columns centered">
<section id="post-nav">
<?php posts_nav_link(); ?>
</section><!--End Navigation-->
</div>
</div>

<?php else: ?>

<div class="row">
<div class="sixteen columns">
<div class="twelve columns">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
<h5 class="latest-title">
<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h5>
<?php the_excerpt(); ?>
</article>
<?php endwhile; ?>
</div>
<?php get_sidebar(); ?>
<?php else : ?>
	<h2 class="center"><?php esc_attr_e('Nothing is Here - Page Not Found', ''); ?></h2>
	<div class="entry-content">
	<p><?php esc_attr_e( 'Sorry, but we couldn\'t find what you we\'re looking for.', '' ); ?></p>
	<?php get_search_form(); ?>
	</div><!-- .entry-content -->
</div>
</div>
<?php endif; ?>
<div class="row">
<div class="ten columns centered">
<section id="post-nav" role="navigation">
<?php posts_nav_link(); ?>
</section><!--End Navigation-->
</div>
</div>

<?php endif; ?>

<?php get_footer(); ?>