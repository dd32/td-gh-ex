<div id="sidebar" class="<?php if (class_exists('WooCommerce') && (is_woocommerce() || is_cart() || is_checkout())){ echo 'col-lg-3 col-md-3';}else{ echo 'col-lg-4 col-md-4'; }  ?> col-sm-12 col-xs-12">
	<?php if (is_active_sidebar('primary-sidebar')) {
        dynamic_sidebar('primary-sidebar');
    } else { ?>
	<div class="widget">
		<div class="title">
			<h2>What’s Hot</h2>
		</div><!-- end title -->
		<ul class="recent_posts_widget">
			<li>
			<a href="#"><img src="demos/sidebar_hot_01.jpg" alt="" />Android Toy Restyled Again Latest Phone.</a>
			<a class="readmore" href="#">Feburay 16, 2013</a>
			   <div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div><!-- rating -->
			</li>
			<li>
				<a href="#"><img src="demos/sidebar_hot_02.jpg" alt="" />Nulla vitae libero, a pharetra. </a>
				<a class="readmore" href="#">Feburay 16, 2013</a>
			   <div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div><!-- rating -->
			</li>
			<li>
			<a href="#"><img src="demos/sidebar_hot_03.jpg" alt="" />This is another review post.</a>
			<a class="readmore" href="#">Feburay 16, 2013</a>
			   <div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star-o"></i>
				</div><!-- rating -->
			</li>
			<li>
				<a href="#"><img src="demos/sidebar_hot_04.jpg" alt="" />Did you see our new fruit?</a>
				<a class="readmore" href="#">Feburay 16, 2013</a>
			   <div class="rating">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div><!-- rating -->
			</li>
		</ul><!-- recent posts -->  
	</div><!-- end widget -->
	
	<div class="widget">
		<div class="title">
			<h2>Tabbed Widget</h2>
		</div><!-- end title -->
		<div id="tabbed_widget" class="tabbable">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#recent" data-toggle="tab">RECENT</a></li>
				<li><a href="#new" data-toggle="tab">POPULAR</a></li>
				<li><a href="#commentstab" data-toggle="tab">COMMENTS</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="recent">
					<ul class="recent_posts_widget">
						<li>
						<a href="#"><img src="demos/tabbed_widget_01.jpg" alt="" />Restyled Again Latest Phone.</a>
						<a class="readmore" href="#">Feburay 16, 2013</a>
						   <div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div><!-- rating -->
						</li>
						<li>
							<a href="#"><img src="demos/tabbed_widget_02.jpg" alt="" />Nulla vitae libero, a pharetra. </a>
							<a class="readmore" href="#">Feburay 16, 2013</a>
						   <div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div><!-- rating -->
						</li>
						<li>
						<a href="#"><img src="demos/tabbed_widget_03.jpg" alt="" />This is another review post.</a>
						<a class="readmore" href="#">Feburay 16, 2013</a>
						   <div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div><!-- rating -->
						</li>
					</ul><!-- recent posts -->  
				</div>
				<div class="tab-pane" id="new">
					<ul class="recent_posts_widget">
						<li>
						<a href="#"><img src="demos/tabbed_widget_03.jpg" alt="" />Restyled Again Latest Phone.</a>
						<a class="readmore" href="#">Feburay 16, 2013</a>
						   <div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div><!-- rating -->
						</li>
						<li>
							<a href="#"><img src="demos/tabbed_widget_02.jpg" alt="" />Nulla vitae libero, a pharetra. </a>
							<a class="readmore" href="#">Feburay 16, 2013</a>
						   <div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div><!-- rating -->
						</li>
						<li>
						<a href="#"><img src="demos/tabbed_widget_01.jpg" alt="" />This is another review post.</a>
						<a class="readmore" href="#">Feburay 16, 2013</a>
						   <div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div><!-- rating -->
						</li>
					</ul><!-- recent posts -->  
				</div>
				<div class="tab-pane" id="commentstab">
					<ul class="recent_posts_widget">
						<li>
						<a href="#"><img src="demos/sidebar_hot_01.jpg" alt="" />Android Toy Restyled Again Latest Phone.</a>
						<a class="readmore" href="#">Feburay 16, 2013</a>
						   <div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div><!-- rating -->
						</li>
						<li>
							<a href="#"><img src="demos/sidebar_hot_02.jpg" alt="" />Nulla vitae libero, a pharetra. </a>
							<a class="readmore" href="#">Feburay 16, 2013</a>
						   <div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div><!-- rating -->
						</li>
						<li>
						<a href="#"><img src="demos/sidebar_hot_03.jpg" alt="" />This is another review post.</a>
						<a class="readmore" href="#">Feburay 16, 2013</a>
						   <div class="rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div><!-- rating -->
						</li>
					</ul><!-- recent posts -->  
				</div>
			</div><!-- end tab content -->
		</div><!-- end tab pane -->
	</div><!-- end widget -->
	
	<div class="widget">
		<div class="title">
			<h2>KEEP IN TOUCH</h2>
		</div><!-- end title -->
		
		<div class="social_widget">
			<div class="social_like">
				<div class="icon-container pull-left">
					<i class="fa fa-twitter"></i>
				</div>
				<div class="social_count">
					<h3><a href="#">Follow Us on Twitter</a></h3>
					<small>37 Followers</small>
					<div class="social_button">
						<a href="#" class="btn btn-primary">Follow</a>
					</div>
				</div>
			</div><!-- end social like -->
			<div class="social_like">
				<div class="icon-container pull-left">
					<i class="fa fa-facebook"></i>
				</div>
				<div class="social_count">
					<h3><a href="#">Like on Facebook</a></h3>
					<small>221 Fans</small>
					<div class="social_button">
						<a href="#" class="btn btn-primary">Like</a>
					</div>
				</div>
			</div><!-- end social like -->
			<div class="social_like">
				<div class="icon-container pull-left">
					<i class="fa fa-youtube"></i>
				</div>
				<div class="social_count">
					<h3><a href="#">Youtube Playlist</a></h3>
					<small>6169 Subscribers</small>
					<div class="social_button">
						<a href="#" class="btn btn-primary">Subscribe</a>
					</div>
				</div>
			</div><!-- end social like -->
			<div class="social_like">
				<div class="icon-container pull-left">
					<i class="fa fa-flickr"></i>
				</div>
				<div class="social_count">
					<h3><a href="#">Flickr Stream</a></h3>
					<small>887 Followers</small>
					<div class="social_button">
						<a href="#" class="btn btn-primary">Follow</a>
					</div>
				</div>
			</div><!-- end social like -->
		</div><!-- end social-widget -->
	</div><!-- end widget -->
	<?php } ?>
</div><!-- end content -->