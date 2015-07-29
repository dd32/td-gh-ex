<?php

get_header();

?>

<section class="error-404 row clearfix">
	<div class="col-md-6 col-sm-6 col-xs-12 left-col">
		<p><?php _e('404','beatmix_lite'); ?></p>
	</div><!--col-md-6-->
	<div class="col-md-6 col-sm-6 col-xs-12 right-col">
		<h1><?php _e('Page not found...','beatmix_lite'); ?></h1>
		<p><?php _e("We're sorry, but we can't find the page you were looking for. It's probably some thing we've done wrong but now we know about it we'll try to fix it. In the meantime, try one of this options:",'beatmix_lite'); ?></p>
		<ul class="arrow-list">
			<li><a href="javascript: history.go(-1);"><?php _e( 'Go back to previous page', 'beatmix_lite' ); ?></a></li>
			<li><a href="<?php echo esc_url( home_url() ); ?>"><?php _e( 'Go to homepage', 'beatmix_lite' ); ?></a></li>
		</ul>
	</div><!--col-md-6-->
</section><!--error-404-->

<?php
get_footer();

