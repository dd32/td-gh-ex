<?php if( is_active_sidebar('sidebar-primary') ) : ?>
<div class="col-md-4 col-xs-12">
	<div class="sidebar">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-primary') ) : ?> 
		<?php endif;?>
	<div>
</div>
<?php endif; ?>	