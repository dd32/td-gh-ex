jQuery(document).ready(function($) {
	if ($(window).width() > 900){
        jQuery('.stickey_wrap_main_cont, .sidebar_stickey_wrap')
            .theiaStickySidebar({
                additionalMarginTop: 30
            });
	}
    
    // for search show hide header
  $(".article_search").click(function(){
    $(".header_search_form").toggleClass("slow_search_header");
    return false;
  });
  $(".header_search_close").click(function(){
    $(".header_search_form").toggleClass("slow_search_header");
  });

});