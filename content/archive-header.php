<?php
/* Category header */
if( is_category() ){ ?>
	<div class='archive-header'>
		<i class="fa fa-folder-open"></i>
		<h2>
			<?php _e('Category archive for:', 'unlimited'); ?>
			<?php single_cat_title(); ?>
		</h2>
	</div>
<?php
}
/* Tag header */
elseif( is_tag() ){ ?>
	<div class='archive-header'>
		<i class="fa fa-tag"></i>
		<h2>
			<?php _e('Tag archive for:', 'unlimited'); ?>
			<?php single_tag_title(); ?>
		</h2>
	</div>
<?php
}
/* Author header */
elseif( is_author() ){
	$author = get_userdata(get_query_var('author')); ?>
	<div class='archive-header'>
		<i class="fa fa-user"></i>
		<h2>
			<?php _e('Author archive for:', 'unlimited'); ?>
			<?php echo $author->nickname; ?>
		</h2>
	</div>
<?php
}
/* Date header */
elseif( is_date() ){ ?>
	<div class='archive-header'>
		<i class="fa fa-calendar"></i>
		<h2>
			<?php _e('Date archive for:', 'unlimited'); ?>
			<?php single_month_title(' '); ?>
		</h2>
	</div>
<?php
}
/* sticky post */
if( is_sticky() ) { ?>
	<div class='archive-header sticky-header'>
		<i class="fa fa-thumb-tack"></i>
		<h2>
			<?php _e('Featured post', 'unlimited'); ?>
		</h2>
	</div>
<?php
}