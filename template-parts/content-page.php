<?php
/**
* content-page.php
*
* @author    Franchi Design
* @package   Atomy
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php atomy_post_thumbnail(); ?>
	<header class="entry-header pt-0 text-center <?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
		<?php the_title( '<h1 class="entry-title mt-4">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content <?php echo esc_attr( get_theme_mod( 'atomy_enable_full_width_body','container') )?>">
		<?php
		the_content();
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'atomy' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->



