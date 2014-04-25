<div class="row">
	<div class="col-sm-12 col-md-12">
		<div  id="post-<?php the_ID(); ?>" <?php post_class('post-item media post-chat'); ?>>
		<div class="thumbnail">
			<span class="post-format-icon chat">
				<i class="fa fa-comments"></i>
			</span>
			</div>
              <div class="media-body">
                <?php
                the_content('more');
                ?>
              </div>
		</div>
	</div>
</div>