<?php 
/**
 * @package Apprise
 */
?>
<div class="meta">
	<span class="meta-comments"><i class="fa fa-comments-o"></i><a href="<?php comments_link(); ?>"><?php comments_number(  __('No Comments','apprise'), __('1 Comment','apprise'), __('% Comments','apprise')); ?></a></span>
	<span class="meta-more"><i class="fa fa-arrow-circle-o-right"></i><a href="<?php the_permalink() ?>"><?php echo __('More','apprise'); ?></a></span>
</div>