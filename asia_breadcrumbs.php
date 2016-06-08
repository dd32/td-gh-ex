<?php
// theme sub header breadcrumb functions
function curPageURL() {
	$pageURL = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return esc_url($pageURL);
}

if( !function_exists('asiathemes_breadcrumbs') ):
	function asiathemes_breadcrumbs() { 
			
		global $post;
		$homeLink = home_url();
	?>
		<!-- Page Title Section -->
<div class="buy-it-area">
  <div class="page-title">
	<div class="container">
	  <div class="row">
				
						<div class="col-md-6 wow fadeInLeft animated" data-wow-delay=".5s">
							<?php
								echo '<h6 class="top-breadcrumb">';
								
								 if (is_home() || is_front_page()) :
								    echo '<a href="'.$homeLink.'">'.__('Home','becorp').'</a>';
									echo '<a class="active" href="'.$homeLink.'">'.get_bloginfo( 'name' ).'</a>';
								 else:
									echo '<a href="'.$homeLink.'">'.__('Home','becorp').'</a>';
									// Blog Category
									if ( is_category() ) {
										echo '<a class="active" href="'. curPageURL() .'">' . __('Archive category','becorp').' "' . single_cat_title('', false) . '"</a>';

									// Blog Day
									} elseif ( is_day() ) {
										echo '<a class="active" href="'. get_year_link(get_the_time('Y')) . '">'. get_the_time('Y') .'</a>';
										echo '<a class="active" href="'. get_month_link(get_the_time('Y'),get_the_time('m')) .'">'. get_the_time('F') .'</a>';
										echo '<a class="active" href="'. curPageURL() .'">'. get_the_time('d') .'</a>';

									// Blog Month
									} elseif ( is_month() ) {
										echo '<a class="active" href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>';
										echo '<a class="active" href="'. curPageURL() .'">'. get_the_time('F') .'</a>';

									// Blog Year
									} elseif ( is_year() ) {
										echo '<a class="active" href="'. curPageURL() .'">'. get_the_time('Y') .'</a>';

									// Single Post
									} elseif ( is_single() && !is_attachment() ) {
										
										// Custom post type
										if ( get_post_type() != 'post' ) {
											$cat = get_the_category(); 
											$cat = $cat[0];
											
												echo get_category_parents($cat, TRUE, '');
											
											echo '<a class="active" href="' . curPageURL() . '">'. wp_title( '',false ) .'</a>';
										} }  
										elseif ( is_page() && $post->post_parent ) {
										$parent_id  = $post->post_parent;
										$breadcrumbs = array();
										while ($parent_id) {
											$page = get_page($parent_id);
											$breadcrumbs[] = '<a class="active" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
											$parent_id  = $page->post_parent;
										}
										$breadcrumbs = array_reverse($breadcrumbs);
										foreach ($breadcrumbs as $crumb) echo $crumb;
										
										echo '<a class="active" href="' . curPageURL() . '">'. get_the_title() .'</a>';

									
									}
									elseif( is_search() )
									{
										echo '<a class="active" href="' . curPageURL() . '">'. get_search_query() .'</a>';
									}
									elseif( is_404() )
									{
										echo '<a class="active" href="' . curPageURL() . '">404 Error</a>';
									}
									else { 
										// Default
										echo '<a class="active" href="' . curPageURL() . '">'. get_the_title() .'</a>';
									}
								endif;
								
								echo '</h6>'
						?>
						</div>
						
						   <?php if (is_home() || is_front_page()) :
									echo '<div class="col-md-6 text-right wow fadeInRight animated" data-wow-delay=".8s"><h2>'.__('Home','becorp').'</h2></div>';
								else:
									becorp_archive_title();
								endif;
						   ?>
					</div>
				</div>
			</div>
		</div>
		<div class="page-seperate"></div>
		<!-- /Page Title Section -->

		<div class="clearfix"></div>
	<?php }
endif
?>