<?php 
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10); 

add_action('woocommerce_before_main_content', 'webriti_corpbiz_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'webriti_corpbiz_wrapper_end', 10);

function webriti_corpbiz_wrapper_start() { ?>
<!-- Header Strip -->
<div class="page_mycarousel">
  <div class="container page_title_col">
    <div class="row">
		<div class="hc_page_header_area">
      <h1 class="about_head pull-left">
				<?php  the_title(); ?>
	  </h1>
	  </div>
    </div>
  </div>
</div>
<!-- /Header Strip -->
 <div class="container"><div class="row blog_sidebar_section">
 <div class="<?php if( is_active_sidebar('sidebar-primary')) echo "col-md-8"; else echo "col-md-12";?>">
 <?php }
 function webriti_corpbiz_wrapper_end() {
if( is_active_sidebar('sidebar-primary')){ echo "</div>"; get_sidebar(); echo "</div></div>"; }
else { echo "</div></div></div>"; } } ?>