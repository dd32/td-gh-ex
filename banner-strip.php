<?php 
get_header();?>
<!-- Header Strip -->
<div class="hero-unit-small">
	<div class="container">
		<div class="row-fluid about_space">
			<div class="span8">
				<h2 class="page_head"><?php
				if(is_search())
				{
					printf( esc_html__( "Search results for %s", 'rambo' ), get_search_query() );
				}
				elseif (is_home()) {
				 esc_html_e('Home', 'rambo' );
				}
				elseif(is_404())
				{
				 esc_html_e('Oops! Page not found', 'rambo' );	
				}
				else
				{
				$page_title = $wp_query->post->post_title;
				echo esc_html($page_title); } ?></h2>
			</div>
			
			<div class="span4">
				<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div class="input-append search_head pull-right">
					<input type="text"   name="s" id="s" placeholder="<?php esc_attr_e( "Search", 'rambo' ); ?>" />
					<button type="submit" class="Search_btn" name="submit" ><?php esc_html_e( "Go", 'rambo' ); ?></button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- /Header Strip -->