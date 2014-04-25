<div class="row">
	<div class="col-sm-12 col-md-12">
	<div class="thumbnail">
	<?php if ( has_post_thumbnail() ) { ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('slide-image'); ?></a>
			<?php } ?>
	<span class="post-format-icon gallery">
		<i class="fa fa-picture-o"></i>
	</span>
	</div> <!-- .thumbnail -->

		<div  id="post-<?php the_ID(); ?>" <?php post_class('post-item media post-gallery'); ?>>
			
			<h3>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h3>
		<?php do_action('ThemingStrap_entry_header'); ?>
		
		<?php the_content('more'); ?>
		<?php do_action('ThemingStrap_entry_footer'); ?>
		</div>
	</div>
</div>