
<?php 
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10); 

add_action('woocommerce_before_main_content', 'webriti_rambo_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'webriti_rambo_wrapper_end', 10);

function webriti_rambo_wrapper_start() {?>
<!-- Header Strip -->
<div class="page_mycarousel">
  <div class="container page_title_col">
    <div class="row">
		<div class="hc_page_header_area">
      <h1 class="about_head pull-left">
				<?php  the_title(); ?>
	  </h1>
	  </div>
     <!-- <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div class="input-append search_head pull-right">
          <input type="text" class="search_input"   name="s" id="s" placeholder="<?php esc_attr_e( "Search", 'corpbiz' ); ?>" />
          <button type="submit" class="Search_btn" name="submit" ><?php esc_attr_e( "Go", 'corpbiz' ); ?></button>
        </div>
      </form>-->
    </div>
  </div>
</div>
<!-- /Header Strip -->
 <div class="container"><div class="row blog_sidebar_section">
 <div class="<?php if( is_active_sidebar('sidebar-primary')) echo "col-md-8"; else echo "span12";?>">
 <?php } ?>
 
<?php function webriti_rambo_wrapper_end() {
if( is_active_sidebar('sidebar-primary')){ echo "</div>"; get_sidebar(); echo "</div></div>"; }
else { echo "</div></div></div>"; } }?>