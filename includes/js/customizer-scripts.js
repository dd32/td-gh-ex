
// Scripts for the theme customizer

var $str = jQuery.noConflict();

$str(document).ready(function() {
	
	var links = '<style type="text/css">.bnt-extra-link{width:100%;display:block;padding:9px 15px;box-sizing:border-box;font-weight:700;position:relative;border-top:1px solid #ddd}.bnt-extra-link:hover{background-color:#ddd}.bnt-extra-link .dashicons{font-size:18px;margin-right:10px;}.bnt-extra-link:after{content:"›";position:absolute;top:-2px;right:0;padding:9px 15px;line-height:20px;font-size:20px;}.bnt-extra-link-1{margin-top:-15px;}.bnt-extra-link-4{margin-bottom:-15px;border-bottom:1px solid #ddd;}</style><a class="bnt-extra-link bnt-extra-link-1" href="'+phpvars.adminurl+'"><span class="dashicons dashicons-admin-generic"></span>'+phpvars.options+'</a><a class="bnt-extra-link bnt-extra-link-2" style="color:darkorange" href="http://satoristudio.net/bento-free-wordpress-theme/?utm_source=customizer&utm_medium=theme&utm_campaign=theme#expansion-pack" target="_blank"><span class="dashicons dashicons-carrot"></span>'+phpvars.exp+'</a><a class="bnt-extra-link bnt-extra-link-3" href="http://wordpress.org/support/view/theme-reviews/bento?filter=5" target="_blank"><span class="dashicons dashicons-star-filled"></span>'+phpvars.review+'</a><a class="bnt-extra-link bnt-extra-link-4" href="http://satoristudio.net/bento-manual?utm_source=customizer&utm_medium=theme&utm_campaign=theme" target="_blank"><span class="dashicons dashicons-book"></span>'+phpvars.documentation+'</a>';
	
	$str('#customize-theme-controls').prepend(links);
		
});