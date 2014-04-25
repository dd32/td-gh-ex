<div class="row">
	<div class="col-sm-12 col-md-12">
	<div class="thumbnail">
			<span class="post-format-icon video">
				<i class="fa fa-video-camera"></i>
			</span>
			</div>
		<div  id="post-<?php the_ID(); ?>" <?php post_class('post-item media post-video'); ?>>
			
			<h3>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
		<?php do_action('ThemingStrap_entry_header'); ?>
		<?php the_content('more'); ?>
		<?php do_action('ThemingStrap_entry_footer'); ?>
		</div>
	</div>
</div>