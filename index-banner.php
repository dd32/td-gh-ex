<!-- Page Section -->
<div class="page_mycarousel" <?php if(get_post_meta( get_the_ID(), 'page_header_image', true )) { ?> style="background: url('<?php echo esc_attr(get_post_meta( get_the_ID(), 'page_header_image', true )); ?>')  repeat scroll 0 0 / cover;" <?php } ?> >
	<div class="container page_title_col">
		<div class="row">
			<div class="hc_page_header_area">
				<h1><?php the_title(); ?></h1>		
			</div>
		</div>
	</div>
</div>
<!-- /Page Section -->