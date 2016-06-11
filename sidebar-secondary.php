<?php if (class_exists('WooCommerce') && (is_woocommerce() || is_cart() || is_checkout())) return; ?>
<div id="two-sidebar" class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	<?php if (is_active_sidebar('secondary-sidebar')) {
        dynamic_sidebar('secondary-sidebar');
    } else { ?>
	<div class="widget">
		<div class="title">
			<h2>About Us</h2>
			<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. </p>
		</div><!-- end title -->
	</div>
	<div class="widget">
		<form action="#" class="search_form">
			<input type="text" class="form-control" placeholder="Search">     
		</form><!-- end search form -->
	</div>
	<div class="widget">
		<div class="title">
			<h3>Popular Tags</h3>
		</div><!-- end title -->
		<div class="tagcloud">
			<a href="#" class="" title="12 topics">responsive</a>
			<a href="#" class="" title="2 topics">mobile</a>
			<a href="#" class="" title="21 topics">interface</a>
			<a href="#" class="" title="5 topics">web</a>
			<a href="#" class="" title="62 topics">image</a>
			<a href="#" class="" title="12 topics">stock</a>
			<a href="#" class="" title="88 topics">mock up</a>
			<a href="#" class="" title="15 topics">logo</a>
			<a href="#" class="" title="5 topics">web</a>
			<a href="#" class="" title="62 topics">image</a>
			<a href="#" class="" title="12 topics">stock</a>
			<a href="#" class="" title="88 topics">mock up</a>
			<a href="#" class="" title="15 topics">logo</a>
		</div>
	</div><!-- end widget -->

	<div class="widget">
		<div class="title"><h2>Categories</h2></div>
		<ul class="nav nav-tabs nav-stacked">
			<li><a href="#">User Interface</a></li>
			<li><a href="#">Website Design</a></li>
			<li><a href="#">Mobile Applications</a></li>
			<li><a href="#">CMS Solutions</a></li>
			<li><a href="#">Typography</a></li>
		</ul>                              
	</div><!-- end widget -->
	
	<div class="widget">
		<div class="title">
			<h3>Recent Posts</h3>
		</div><!-- end title -->
		<ul class="footer_post">
			<li><a href="#"><img class="img-rounded" src="demos/footer_post_01.jpg" alt=""></a></li>
			<li><a href="#"><img class="img-rounded" src="demos/footer_post_02.jpg" alt=""></a></li>
			<li><a href="#"><img class="img-rounded" src="demos/footer_post_03.jpg" alt=""></a></li>
			<li><a href="#"><img class="img-rounded" src="demos/footer_post_04.jpg" alt=""></a></li>
			<li><a href="#"><img class="img-rounded" src="demos/footer_post_05.jpg" alt=""></a></li>
			<li><a href="#"><img class="img-rounded" src="demos/footer_post_06.jpg" alt=""></a></li>
		</ul><!-- recent posts -->  
	</div><!-- end widget -->
	
	<div class="widget">
		<div class="title">
			<h3>NewsLetter</h3>
		</div><!-- end title -->
		<div class="newsletter_widget">
			<p>Subscribe to our newsletter to receive news, updates, free stuff and new releases by email. We don't do spam..</p>
			<form action="#" class="newsletter_form">
				<input type="text" class="form-control" placeholder="Enter your email address"> 
				<a href="#" class="btn btn-primary pull-right">Subscribe</a>    
			</form><!-- end newsletter form -->
		</div>
	</div><!-- end widget -->
	<?php } ?>
</div><!-- end left-sidebar -->