<div class="row">
	<div class="col-sm-12 col-md-12">
	<div class="thumbnail">
			<span class="post-format-icon status">
				<i class="fa fa-comments-o"></i>
			</span>
		</div>
		<div  id="post-<?php the_ID(); ?>" <?php post_class('post-item media post-status'); ?>>
		
			<div class="thumbnail pull-left post-author-avatar">
                <?php global $current_user;
		      	get_currentuserinfo();
				echo get_avatar( $current_user->user_email, 70 ); ?>
              </div> <!-- .thumbnail -->
              <div class="media-body">
                <?php
                the_content('more');
                ?>
              </div>
		</div>
	</div>
</div>