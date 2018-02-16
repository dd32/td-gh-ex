<div class="column col-4 col-sm-12">
	<?php get_template_part( 'template-parts/topbar/topbar-elements/navigation' ); ?>
</div>
<div class="column col-8 col-sm-12">
	<?php if ( is_active_sidebar( 'topbar-sidebar' ) ) : ?>
		<?php dynamic_sidebar( 'topbar-sidebar' ); ?>
	<?php endif; ?>
</div>
