<?php if ( is_sticky() && is_home() | is_singular() && ! is_paged() ) : ?>
<div class="thumbnail">
<?php if ( has_post_thumbnail() ) { ?>	
		<a href="<?php the_permalink(); ?>"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></a>		
		<?php } ?>
	<span class="post-format-icon">
		<i class="fa fa-thumb-tack"></i>
	</span>		
	</div> <!-- .thumbnail -->	
<div  id="post-<?php the_ID(); ?>" <?php post_class('post-item media post-sticky'); ?>>	
	<h3>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>	
	<?php do_action('ThemingStrap_entry_header'); ?>
		<?php the_content('more'); ?>
		<div class="clearfix"></div>
	<?php do_action('ThemingStrap_entry_footer'); ?>
	<?php edit_post_link( __( 'Edit', 'ThemingStrap' ), '<span class="glyphicon glyphicon-pencil"></span> ' ); ?>
</div>
<?php else : ?>
<div class="thumbnail">
<?php if ( has_post_thumbnail() ) { ?>	
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide-image'); ?></a>	
	<?php } ?>
	<span class="post-format-icon standard">
		<i class="fa fa-file-text-o"></i>
	</span>
	</div>
<div  id="post-<?php the_ID(); ?>" <?php post_class('post-item media post-standard'); ?>>

	<h3>
		<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</h3>
	<?php do_action('ThemingStrap_entry_header'); ?>
	
<?php the_content('more'); ?>
<div class="clearfix"></div>
<?php //wp_link_pages( $ThemingStrap_wp_link_pages ); ?> 
<?php do_action('ThemingStrap_entry_footer'); ?>
<?php edit_post_link( __( 'Edit', 'ThemingStrap' ), '<span class="glyphicon glyphicon-pencil"></span> ' ); ?>
</div>
<?php endif; // is_single() ?>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<div style="display:none; height: 0px;">
	<?php posts_nav_link(' &#183; ', 'previous page', 'next page'); ?>
</div>

