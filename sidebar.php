<?php if ( balanced_blog_is_preview() ) { ?>
	<aside id="sidebar" class="col-md-3">
		<?php balanced_blog_preview_right_sidebar(); ?>
	</aside>
<?php } else if ( is_active_sidebar( 'balanced-blog-right-sidebar' ) ) { ?>
	<aside id="sidebar" class="col-md-3">
		<?php dynamic_sidebar( 'balanced-blog-right-sidebar' ); ?>
	</aside>
<?php } ?>
