
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
	<header class="entry-header page-header">
		<?php
		if( is_sticky() ){ // add 'sticky' label to sticky post
			$sticky = ' <span class="label label-info">'.__( 'sticky', 'activetab' ).'</span>';
		}else{
			$sticky = '';
		}
		?>
		<h1 class="entry-title"><?php the_title(); echo $sticky; ?></h1>

		<?php echo activetab_post_meta(); ?>
	</header> <!-- /.entry-header -->

	<?php get_template_part( 'template-part', 'thumbnail-single' ); ?>

	<section class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="wp_link_pages clearfix"><span class="wp_link_pages-item-empty">' . __( 'Pages:', 'activetab' ).'</span>', 'after' => '</div>', 'link_before' => '<span class="wp_link_pages-item">', 'link_after' => '</span>', 'pagelink' => '%' ) ); ?>
	</section> <!-- /.entry-content -->

</article> <!-- /#post-<?php the_ID(); ?> -->
