<?php
/*	@Theme Name	:	Corpbiz
* 	@file         :	sidebar.php
* 	@package      :	corpbiz
* 	@author       :	Harish
* 	@license      :	license.txt
* 	@filesource   :	wp-content/themes/corpbiz/sidebar.php
*/	
?>
<div class="col-md-4 corpo_sidebar">	
	<?php if ( is_active_sidebar( 'sidebar-primary' ) )
			{ dynamic_sidebar( 'sidebar-primary' );	}
			else  { ?>
		<!--Sidebar-->
			<div class="sidebar_widget1">
				<div class="sidebar_widget_title">
					<h2><?php _e('Search','corpbiz'); ?></h2>
				</div>	
				<div class="search_widget">
				<input type="text" class="input-lg form-control" placeholder="Search Here">
				<a class="btn_red" href="#"><?php _e('Search','corpbiz'); ?></a>
				</div>
			</div>
		
			<div class="sidebar_widget1">
				<div class="sidebar_widget_title">
					<h2><?php _e('Categories','corpbiz'); ?></h2>
				</div>	
				<div class="sidebar_links">
					<p>
						<a href="#"><?php _e('Lorem ipsum dolor','corpbiz'); ?></a>
						
					</p>
					<p>
						<a href="#"><?php _e('Mauris placerat','corpbiz'); ?> </a>
						
					</p>
					<p>
						<a href="#"></i><?php _e('Nulla quis turpisp','corpbiz'); ?></a>
						
					</p>
					<p>
						<a href="#"></i><?php _e('Fusce auctor','corpbiz'); ?></a>
						
					</p>
					<p>
						<a href="#"><?php _e('Lorem ipsum dolor','corpbiz'); ?></a>
						
					</p>
					<p>
						<a href="#"><?php _e('Mauris placerat','corpbiz'); ?></a>
						
					</p>
				</div>
			</div>
			<div class="sidebar_widget1">
				<div class="sidebar_widget_title">
					<h2><?php _e('Tabs Content','corpbiz'); ?></h2>
				</div>
				<ul class="sidebar_tab sidebar_widget_tab">
				  <li class="active"><a href="#latest" data-toggle="tab"><?php _e('Latest','corpbiz'); ?></a></li>
				  <li><a href="#recent" data-toggle="tab"><?php _e('Recent','corpbiz'); ?></a></li>
				  <li><a href="#comment" data-toggle="tab"><?php _e('Comment','corpbiz'); ?></a></li>
				</ul>
				
				<div id="myTabContent" class="tab-content">					
					<div id="latest" class="tab-pane fade active in">
						<div class="row">
							
								<div class="media post_media_sidebar">
									<a class="pull-left sidebar_pull_img" href="#">
										<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/blog-post1.jpg" class="img-responsive post_sidebar_img">
									</a>
									<div class="media-body">
										<h3><a href="#"><?php _e('Vivamus sed elit ornare','corpbiz'); ?></a></h3>
										<p><?php _e('Mauris placerat orci at felis auctor facilisis.','corpbiz'); ?></p>
										<p><a class="readmore" href="#"><?php _e('Read More','corpbiz'); ?></a></p>
									</div>
									<div class="sidebar_comment_box">
										<span><?php _e('By admin','corpbiz'); ?> <a href="#"><i class="fa fa-circle"></i> <?php _e('12 Comments','corpbiz'); ?></a></span>
									</div>
								</div>
								<div class="media post_media_sidebar">
									<a class="pull-left sidebar_pull_img" href="#">
										<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/blog-post1.jpg" class="img-responsive post_sidebar_img">
									</a>
									<div class="media-body">
										<h3><a href="#"><?php _e('Vivamus sed elit ornare','corpbiz'); ?></a></h3>
										<p><?php _e('Mauris placerat orci at felis auctor facilisis.','corpbiz'); ?></p>
										<p><a class="readmore" href="#"><?php _e('Read More','corpbiz'); ?></a></p>
									</div>
									<div class="sidebar_comment_box">
										<span><?php _e('By admin','corpbiz'); ?> <a href="#"><i class="fa fa-circle"></i> <?php _e('12 Comments','corpbiz'); ?></a></span>
									</div>
								</div>
								<div class="media post_media_sidebar">
									<a class="pull-left sidebar_pull_img" href="#">
										<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/blog-post1.jpg" class="img-responsive post_sidebar_img">
									</a>
									<div class="media-body">
										<h3><a href="#"><?php _e('Vivamus sed elit ornare','corpbiz'); ?></a></h3>
										<p><?php _e('Mauris placerat orci at felis auctor facilisis.','corpbiz'); ?></p>
										<p><a class="readmore" href="#"><?php _e('Read More','corpbiz'); ?></a></p>
									</div>
									<div class="sidebar_comment_box">
										<span><?php _e('By admin','corpbiz'); ?> <a href="#"><i class="fa fa-circle"></i> <?php _e('12 Comments','corpbiz'); ?></a></span>
									</div>
								</div>
							
						</div>
					</div>
					
					<div id="recent" class="tab-pane fade">
						<div class="row">
							
								<div class="media post_media_sidebar">
									<a class="pull-left sidebar_pull_img" href="#">
										<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/blog-post1.jpg" class="img-responsive post_sidebar_img">
									</a>
									<div class="media-body">
										<h3><a href="#"><?php _e('Vivamus sed elit ornare','corpbiz'); ?></a></h3>
										<p><?php _e('Mauris placerat orci at felis auctor facilisis.','corpbiz'); ?></p>
										<p><a class="readmore" href="#"><?php _e('Read More','corpbiz'); ?></a></p>
									</div>
									<div class="sidebar_comment_box">
										<span><?php _e('By admin','corpbiz'); ?> <a href="#"><i class="fa fa-comments"></i> <?php _e('12 Comments','corpbiz'); ?></a></span>
									</div>
								</div>
								<div class="media post_media_sidebar">
									<a class="pull-left sidebar_pull_img" href="#">
										<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/blog-post1.jpg" class="img-responsive post_sidebar_img">
									</a>
									<div class="media-body">
										<h3><a href="#"><?php _e('Vivamus sed elit ornare','corpbiz'); ?></a></h3>
										<p><?php _e('Mauris placerat orci at felis auctor facilisis.','corpbiz'); ?></p>
										<p><a class="readmore" href="#"><?php _e('Read More','corpbiz'); ?></a></p>
									</div>
									<div class="sidebar_comment_box">
										<span><?php _e('By admin','corpbiz'); ?> <a href="#"><i class="fa fa-comments"></i> <?php _e('12 Comments','corpbiz'); ?></a></span>
									</div>
								</div>
						</div>
					</div>
					<div id="comment" class="tab-pane fade">
						<div class="row">
							
								<div class="media post_media_sidebar">
									<a class="pull-left sidebar_pull_img" href="#">
										<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/blog-post1.jpg" class="img-responsive post_sidebar_img">
									</a>
									<div class="media-body">
										<h3><a href="#"><?php _e('Vivamus sed elit ornare','corpbiz'); ?></a></h3>
										<p><?php _e('Mauris placerat orci at felis auctor facilisis.','corpbiz'); ?></p>
										<p><a class="readmore" href="#"><?php _e('Read More','corpbiz'); ?></a></p>
									</div>
									<div class="sidebar_comment_box">
										<span><?php _e('By admin','corpbiz'); ?> <a href="#"><i class="fa fa-comments"></i> <?php _e('12 Comments','corpbiz'); ?></a></span>
									</div>
								</div>
						</div>
					</div>
				</div>	
			</div>			
			<div class="sidebar_widget1">
				<div class="sidebar_widget_title">
					<h2><?php _e('Tags','corpbiz'); ?></h2>
				</div>
				<div class="sidebar_widget_tags">
					<a href="#"><?php _e('Wordpress','corpbiz'); ?></a>
					<a href="#"><?php _e('Php','corpbiz'); ?></a>
					<a href="#"><?php _e('Jquery','corpbiz'); ?></a>
					<a href="#"><?php _e('Css','corpbiz'); ?></a>
					<a href="#"><?php _e('Php','corpbiz'); ?></a>
					<a href="#"><?php _e('Jquery','corpbiz'); ?></a>
					<a href="#"><?php _e('Css','corpbiz'); ?></a>
					<a href="#"><?php _e('Javascript','corpbiz'); ?></a>
					<a href="#"><?php _e('Photoshop','corpbiz'); ?></a>
					<a href="#"><?php _e('Html','corpbiz'); ?></a>
					<a href="#"><?php _e('Css','corpbiz'); ?></a>
					<a href="#"><?php _e('Php','corpbiz'); ?></a>
					<a href="#"><?php _e('Jquery','corpbiz'); ?></a>
					<a href="#"><?php _e('Css','corpbiz'); ?></a>
					<a href="#"><?php _e('Javascript','corpbiz'); ?></a>					
				</div>			
			</div>
		<!--Sidebar-->
		<?php } ?>	
</div><!-- Right sidebar ---->