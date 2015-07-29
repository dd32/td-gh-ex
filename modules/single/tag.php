<?php if(has_tag()): ?>
<div class="tag-box text-center">
    <span><i class="fa fa-tags"></i>&nbsp;<?php _e('Tags:', 'beatmix_lite'); ?></span>
		<?php the_tags('', '', ''); ?>
</div>
<?php endif;
