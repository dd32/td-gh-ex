<?php if(has_category()): ?>
  <div class="tag-box category-box text-center">
      <span><i class="fa fa-book"></i>&nbsp;<?php _e('Category:', 'beatmix_lite'); ?></span>
			<?php the_category(' '); ?>
  </div>
<?php endif;    