
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

	<header class="entry-header page-header">
		<?php
		if( is_sticky() ) { // add 'sticky' label to sticky post
			$sticky = ' <span class="label label-info">'.__( 'Sticky', 'activetab' ).'</span>';
		} else {
			$sticky = '';
		}
		?>
		<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a><?php echo $sticky; ?></h3>

		<?php if ( 'post' == get_post_type() ) : // hide meta text for pages ?>
			<?php echo activetab_post_meta(); ?>
		<?php endif; ?>
	</header> <!-- /.entry-header -->

	<?php get_template_part( 'template-part', 'thumbnail-list' ); ?>

	<section class="entry-content">
		<?php
		$excerpt_or_full_content_in_list = of_get_option( 'excerpt_or_full_content_in_list', 'excerpt' );
		if( $excerpt_or_full_content_in_list == 'excerpt' ) {
			the_excerpt( '' );
		} else {
			the_content( '' );
		}
		?>

		<?php //wp_link_pages( array( 'before' => '<div class="wp_link_pages clearfix"><span class="wp_link_pages-item-empty">' . __( 'Pages:', 'activetab' ).'</span>', 'after' => '</div>', 'link_before' => '<span class="wp_link_pages-item">', 'link_after' => '</span>', 'pagelink' => '%' ) ); ?>
	</section> <!-- /.entry-content -->

</article> <!-- /#post-<?php the_ID(); ?> -->
