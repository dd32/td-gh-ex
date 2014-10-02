<?php 
// sidebar template
?>
<div class="four columns">
	<aside id="secondary" class="widget-area" role="complementary">
	<?php do_action( 'before_widget' ); ?>
	<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
		<aside id="archives" class="widget">
		<div class="sidebar-title-block">
			<h4 class="sidebar">
				<?php esc_attr_e( 'Archives', '' ); ?>
			</h4>
			<ul>
				<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
			</ul>
		</div>
		</aside>
	<?php endif; ?>
	</aside>
</div>
