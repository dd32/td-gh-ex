<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Promax
 * @since promax 1.7
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
	<?php
		if (of_get_option('show_featured_image') =='on'){
		if ( has_post_thumbnail()) : the_post_thumbnail('promax_singlefull');
		?>
		<?php the_title( '<h1 class="entry-title featured">', '</h1>' ); ?>
		<?php
		endif;
		}
		else { ?>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php }
		?>
		<div id="metad"><span class="postmeta_box">
		<?php get_template_part('/includes/postmeta'); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'promax' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
		</span></div>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		if ( of_get_option('promax_ad2') <> "" ) { echo stripslashes(of_get_option('promax_ad2')); }
			the_content();
		if (get_the_tags()) : echo '<span class="tags">'; if("the_tags") the_tags(''); echo '</span>'; endif;
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'promax' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'promax' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );

			if ( of_get_option('promax_author' ) =='1' ) {
				get_template_part( 'includes/author' );
			}
		?>
	</div><!-- .entry-content -->
	<div id="footerads">
<?php if ( of_get_option('promax_ad1') <> "" ) { echo stripslashes(of_get_option('promax_ad1')); } ?>
</div>
</article><!-- #post-## -->
