<div class="row">
	<div class="col-sm-12 col-md-12">
	<div class="thumbnail">
			<span class="post-format-icon quote">
				<i class="fa fa-quote-left"></i>
			</span>
			</div>
		<div  id="post-<?php the_ID(); ?>" <?php post_class('post-item media post-quote'); ?>>
		
	        <div class="media-body">
	        	<?php
	            the_content('more');
	            ?>
	        </div>
		</div>
	</div>
</div>