<section class="post-wrapper-top section-shadow clearfix">
	<div class="container">
		<div class="col-lg-12">
			<?php if(class_exists('woocommerce') && is_shop()){
			echo '<h2>'.__('Shop','awada').'</h2>';
			}else{?>
			<h2><?php the_title(); ?></h2>
			<?php } ?>
			<?php awada_breadcrumbs(); ?>
		</div>
	</div>
</section><!-- end post-wrapper-top -->