jQuery(document).ready(function($){
	
	$( "#page_template" ).change(function(){
		XinTemplate( $(this).val() );
	});

	function XinTemplate( template ){
		$( "#xin-page-meta" ).hide();

		if ( 'pages/portfolio.php' == template
			|| 'pages/blog-summary.php' == template) {
			$( "#p_xin_category" ).show();
			$( "#p_xin_postperpage" ).show();
			$( "#p_xin_sidebar" ).show();
			$( "#p_xin_title" ).show();
			$( "#p_xin_column" ).show();
			$( "#p_xin_thumbnail" ).show();
			$( "#p_xin_size_x" ).show();
			$( "#p_xin_size_y" ).show();
			$( "#p_xin_intro" ).show();
			$( "#p_xin_disp_meta" ).show();

			$( "#xin-page-meta" ).show();
		}
		else if ( 'pages/blog.php' == template ) {
			$( "#p_xin_category" ).show();
			$( "#p_xin_postperpage" ).show();
			$( "#p_xin_sidebar" ).show();
			$( "#p_xin_title" ).show();
			$( "#p_xin_column" ).hide();
			$( "#p_xin_thumbnail" ).hide();
			$( "#p_xin_size_x" ).hide();
			$( "#p_xin_size_y" ).hide();
			$( "#p_xin_intro" ).hide();
			$( "#p_xin_disp_meta" ).hide();

			$( "#xin-page-meta" ).show();
		}
		else if ( 'pages/imageslider.php' == template ) {
			$( "#p_xin_category" ).show();
			$( "#p_xin_postperpage" ).show();
			$( "#p_xin_sidebar" ).show();
			$( "#p_xin_title" ).hide();
			$( "#p_xin_column" ).hide();
			$( "#p_xin_thumbnail" ).show();
			$( "#p_xin_size_x" ).show();
			$( "#p_xin_size_y" ).show();
			$( "#p_xin_intro" ).hide();
			$( "#p_xin_disp_meta" ).hide();

			$( "#xin-page-meta" ).show();
		}
	}
	
	XinTemplate( $( "#page_template" ).val() );
});
