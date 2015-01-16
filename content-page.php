<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package avenue
 */
?>

<article id="post-<?php the_ID(); ?>" <?php //post_class(); ?> class="col-md-9 <?php echo of_get_option('sc_homepage_sidebar'); ?>">
	<header class="entry-header">
            <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <div class="avenue-underline"></div>
	</header><!-- .entry-header -->
        
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'avenue' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'avenue' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<?php if( 'sidebar-on' == of_get_option('sc_homepage_sidebar', 'sidebar-off')) : ?>
<div class="col-md-3 avenue-sidebar">
    <?php get_sidebar(); ?>
</div>
<?php endif; ?>